<?php

namespace InvoiceNinja\EInvoice\Tests\Serialization;

use InvoiceNinja\EInvoice\EInvoice;
use InvoiceNinja\EInvoice\Models\Normalizers\IdentifierDenormalizer;
use InvoiceNinja\EInvoice\Models\Peppol\Invoice;
use InvoiceNinja\EInvoice\Validation\Profiles\InvoiceSettingsProfile;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\NotBlank;

class IdentifierDenormalizerTest extends TestCase
{
    public static function identifierTypesAndValues(): iterable
    {
        foreach (glob(__DIR__ . '/../../src/Models/Peppol/IdentifierType/*.php') as $file) {
            $name = basename($file, '.php');
            foreach (['text' => 'PO-001', 'leading zeroes' => '00123', 'string zero' => '0', 'integer zero' => 0, 'integer' => 123, 'large numeric string' => '999999999999999999999999', 'unicode' => 'Réf-東京', 'empty' => ''] as $label => $value) {
                yield "$name $label" => ['InvoiceNinja\\EInvoice\\Models\\Peppol\\IdentifierType\\' . $name, $value];
            }
        }
    }

    #[DataProvider('identifierTypesAndValues')]
    public function testEveryIdentifierTypePreservesScalarAndWrappedValues(string $class, string|int $value): void
    {
        $metadata = new ClassMetadataFactory(new AttributeLoader());
        $normalizer = new ObjectNormalizer($metadata, new MetadataAwareNameConverter($metadata));
        $serializer = new Serializer([new IdentifierDenormalizer($normalizer), $normalizer], [new JsonEncoder()]);
        // Repeat mixed forms in one serializer to exercise support caching.
        foreach ([$value, ['value' => $value, 'schemeID' => '0088'], ['#' => $value, '@schemeID' => '0088'], $value] as $input) {
            $identifier = $serializer->deserialize(json_encode($input, JSON_THROW_ON_ERROR), $class, 'json');
            $this->assertInstanceOf($class, $identifier);
            $this->assertSame($value, $identifier->value);
            if (is_array($input)) {
                $this->assertSame('0088', $identifier->schemeID);
            }
        }
    }

    public static function referenceValues(): array
    {
        return [['PO-001'], ['00123'], ['0'], [0], [123], ['999999999999999999999999'], ['Réf-東京']];
    }

    #[DataProvider('referenceValues')]
    public function testPublicEntryPointsAcceptMixedNestedRepresentations(string|int $value): void
    {
        $einvoice = new EInvoice();
        $payload = [
            'ID' => $value,
            'OrderReference' => ['ID' => $value],
            'ProjectReference' => [['ID' => ['value' => 'first']], ['ID' => $value]],
            'ContractDocumentReference' => [['ID' => $value]],
            'InvoiceLine' => [
                ['OrderLineReference' => [['LineID' => ['value' => 'first']]]],
                ['OrderLineReference' => [['LineID' => ['value' => 'second']], ['LineID' => $value]]],
            ],
        ];
        foreach ([$einvoice->decode('Peppol', json_encode($payload)), $einvoice->denormalize($payload, Invoice::class)] as $invoice) {
            $this->assertSame($value, $invoice->ID->value);
            $this->assertSame($value, $invoice->OrderReference->ID->value);
            $this->assertSame($value, $invoice->ProjectReference[1]->ID->value);
            $this->assertSame($value, $invoice->ContractDocumentReference[0]->ID->value);
            $this->assertSame($value, $invoice->InvoiceLine[1]->OrderLineReference[1]->LineID->value);
            $round_trip = $einvoice->decode('Peppol', $einvoice->encode($invoice, 'json'));
            $this->assertSame($value, $round_trip->OrderReference->ID->value);
            $this->assertSame($value, $round_trip->InvoiceLine[1]->OrderLineReference[1]->LineID->value);
        }
        $this->assertSame([], $einvoice->validateRequest($payload, Invoice::class));
        $this->assertSame([], $einvoice->validateRequest($payload, InvoiceSettingsProfile::class));
        $this->assertCount(0, $einvoice->validatePayload($payload, InvoiceSettingsProfile::class, ['invoice_settings']));
    }

    public function testMetadataSurvivesJsonAndXmlHydration(): void
    {
        $einvoice = new EInvoice();
        $metadata = ['schemeID' => '0088', 'schemeName' => 'GLN', 'schemeAgencyID' => '0009', 'schemeAgencyName' => 'Agency', 'schemeVersionID' => '01', 'schemeDataURI' => 'https://example.test/data', 'schemeURI' => 'https://example.test/scheme', 'listURI' => 'https://example.test/list', 'listSchemeURI' => 'https://example.test/list-scheme'];
        $invoice = $einvoice->decode('Peppol', json_encode(['ID' => ['value' => '00123'] + $metadata]));
        $json_round_trip = $einvoice->decode('Peppol', $einvoice->encode($invoice, 'json'));
        $xml_fragment = preg_replace('/<\?xml[^?]*\?>/', '', $einvoice->encode($invoice, 'xml'));
        $xml = '<Invoice xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2">' . $xml_fragment . '</Invoice>';
        $xml_round_trip = $einvoice->decode('Peppol', $xml, 'xml');
        foreach ([$invoice, $json_round_trip, $xml_round_trip] as $result) {
            // XML numeric text conversion predates this fix; keep XML behaviour unchanged.
            $this->assertSame($result === $xml_round_trip ? 123 : '00123', $result->ID->value);
            foreach ($metadata as $property => $value) {
                $expected = $result === $xml_round_trip && is_numeric($value) ? (int) $value : $value;
                $this->assertSame($expected, $result->ID->$property);
            }
        }
    }

    public function testCreditNoteScalarIdentifiersAndXmlStaySupported(): void
    {
        $einvoice = new EInvoice();
        $credit = $einvoice->decode('Peppol', '{"CreditNoteTypeCode":{"value":"381"},"ID":"CN-001","BillingReference":[{"InvoiceDocumentReference":{"ID":"INV-001"}}]}');
        $this->assertInstanceOf(\InvoiceNinja\EInvoice\Models\Peppol\CreditNote::class, $credit);
        $this->assertSame('CN-001', $credit->ID->value);
        $this->assertSame('INV-001', $credit->BillingReference[0]->InvoiceDocumentReference->ID->value);
        foreach (['fact1.xml' => 'INV-321827', 'creditnote1.xml' => 'CN-321827'] as $file => $value) {
            $document = $einvoice->decode('Peppol', file_get_contents(__DIR__ . '/../Data/samples/' . $file), 'xml');
            $this->assertSame($value, $document->ID->value);
        }
    }

    public static function invalidValues(): array
    {
        return [['wrapped array', ['value' => []]], ['wrapped boolean', ['value' => true]], ['wrapped float', ['value' => 1.5]]];
    }

    #[DataProvider('invalidValues')]
    public function testInvalidIdentifiersReportPaths(string $label, mixed $value): void
    {
        $einvoice = new EInvoice();
        $payload = ['ProjectReference' => [['ID' => '001'], ['ID' => $value]]];
        $errors = $einvoice->validatePayload($payload, InvoiceSettingsProfile::class, ['invoice_settings']);
        $this->assertCount(1, $errors, $label);
        $this->assertSame('ProjectReference[1].ID' . (is_array($value) ? '.value' : ''), $errors[0]->getPropertyPath());
        $this->assertSame('einvoice.denormalization.invalid_type', $errors[0]->getCode());
        $this->assertCount(1, $einvoice->validateRequest($payload, Invoice::class));
        $this->expectException(NotNormalizableValueException::class);
        $einvoice->decode('Peppol', json_encode($payload));
    }

    public static function emptyIdentifiers(): array
    {
        return [[''], [['value' => '']], [[]], [null]];
    }

    #[DataProvider('emptyIdentifiers')]
    public function testLegacyAcceptanceAndNewBlankConstraintsRemainSeparate(mixed $value): void
    {
        $einvoice = new EInvoice();
        $payload = ['OrderReference' => ['ID' => $value]];
        $this->assertSame([], $einvoice->validateRequest($payload, Invoice::class));
        $errors = $einvoice->validatePayload($payload, InvoiceSettingsProfile::class, ['invoice_settings']);
        $this->assertCount(1, $errors);
        $this->assertSame('OrderReference.ID.value', $errors[0]->getPropertyPath());
        $this->assertSame(NotBlank::IS_BLANK_ERROR, $errors[0]->getCode());
    }

    public function testUnsupportedScalarTypesRetainLegacyBehaviour(): void
    {
        $einvoice = new EInvoice();
        foreach ([true, false, 1.5] as $value) {
            $payload = ['OrderReference' => ['ID' => $value]];
            $this->assertSame([], $einvoice->validateRequest($payload, Invoice::class));
            $errors = $einvoice->validatePayload($payload, InvoiceSettingsProfile::class, ['invoice_settings']);
            $this->assertCount(1, $errors);
            $this->assertSame('OrderReference.ID.value', $errors[0]->getPropertyPath());
            $this->assertSame(NotBlank::IS_BLANK_ERROR, $errors[0]->getCode());
        }
    }

    public function testOtherModelTypesAreNotScalarConverted(): void
    {
        $normalizer = new IdentifierDenormalizer(new ObjectNormalizer());
        foreach ([Invoice::class, \InvoiceNinja\EInvoice\Models\Peppol\CodeType\InvoiceTypeCode::class, \InvoiceNinja\EInvoice\Models\Peppol\AmountType\PayableAmount::class, \InvoiceNinja\EInvoice\Models\FatturaPA\FatturaElettronica::class] as $class) {
            $this->assertFalse($normalizer->supportsDenormalization('001', $class, 'json'));
        }
        $this->assertFalse($normalizer->supportsDenormalization('001', \InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID::class, 'xml'));
    }
}
