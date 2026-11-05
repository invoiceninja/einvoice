<?php

namespace InvoiceNinja\EInvoice\Tests\Validation;

use InvoiceNinja\EInvoice\EInvoice;
use InvoiceNinja\EInvoice\Models\Peppol\Invoice;
use InvoiceNinja\EInvoice\Models\Peppol\CreditNote;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Validation;

/** Tests actual object attributes directly, independently of the legacy facade. */
class AttributeValidationTest extends TestCase
{
    public function testEmptyDocumentsReportRequiredPropertyPathsAndCodes(): void
    {
        $validator = Validation::createValidatorBuilder()->enableAttributeMapping()->getValidator();
        foreach ([new Invoice(), new CreditNote()] as $document) {
            $line_property = $document instanceof Invoice ? 'InvoiceLine' : 'CreditNoteLine';
            $expected = [];
            foreach (['ID', 'IssueDate', 'AccountingSupplierParty', 'AccountingCustomerParty', 'LegalMonetaryTotal', $line_property] as $path) {
                $expected[] = [$path, NotNull::IS_NULL_ERROR];
                $expected[] = [$path, NotBlank::IS_BLANK_ERROR];
            }
            $actual = [];
            foreach ($validator->validate($document) as $error) {
                $actual[] = [$error->getPropertyPath(), $error->getCode()];
            }
            $this->assertSame($expected, $actual);
        }
    }

    public function testRequiredLineValidationReachesSecondCollectionEntry(): void
    {
        $einvoice = new EInvoice();
        $validator = Validation::createValidatorBuilder()->enableAttributeMapping()->getValidator();
        foreach (['fact1.xml' => 'InvoiceLine', 'creditnote1.xml' => 'CreditNoteLine'] as $file => $line_property) {
            $document = $einvoice->decode('Peppol', file_get_contents('tests/Data/samples/' . $file), 'xml');
            $document->{$line_property}[] = clone $document->{$line_property}[0];
            $this->assertCount(0, $validator->validate($document));
            $document->{$line_property}[1]->ID = null;
            $errors = $validator->validate($document);
            $this->assertCount(2, $errors);
            $this->assertSame($line_property . '[1].ID', $errors[0]->getPropertyPath());
            $this->assertSame(NotNull::IS_NULL_ERROR, $errors[0]->getCode());
            $this->assertSame($line_property . '[1].ID', $errors[1]->getPropertyPath());
            $this->assertSame(NotBlank::IS_BLANK_ERROR, $errors[1]->getCode());
        }
    }

    public function testReferenceHydrationPreservesLeadingZeroesAtEveryIndex(): void
    {
        $payload = [
            'BuyerReference' => '0010',
            'OrderReference' => ['ID' => ['value' => '0013']],
            'ProjectReference' => [['ID' => ['value' => '0011']]],
            'ContractDocumentReference' => [['ID' => ['value' => '0012']]],
            'InvoiceLine' => [
                ['OrderLineReference' => [['LineID' => ['value' => '0001']]]],
                ['OrderLineReference' => [['LineID' => ['value' => '0002']]]],
            ],
        ];
        $invoice = (new EInvoice())->decode('Peppol', json_encode($payload));
        $this->assertSame('0010', $invoice->BuyerReference);
        $this->assertSame('0013', $invoice->OrderReference->ID->value);
        $this->assertSame('0011', $invoice->ProjectReference[0]->ID->value);
        $this->assertSame('0012', $invoice->ContractDocumentReference[0]->ID->value);
        $this->assertSame('0001', $invoice->InvoiceLine[0]->OrderLineReference[0]->LineID->value);
        $this->assertSame('0002', $invoice->InvoiceLine[1]->OrderLineReference[0]->LineID->value);
    }
}
