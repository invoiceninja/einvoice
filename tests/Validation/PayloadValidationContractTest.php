<?php

namespace InvoiceNinja\EInvoice\Tests\Validation;

use InvoiceNinja\EInvoice\EInvoice;
use InvoiceNinja\EInvoice\Validation\Profiles\InvoiceSettingsProfile;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Constraints as Assert;

/** Acceptance tests for the proposed API. Missing implementation must fail, never skip. */
class PayloadValidationContractTest extends TestCase
{
    private function validatePayload(array $payload, string $class, array $groups = []): ConstraintViolationListInterface
    {
        $einvoice = new EInvoice();
        $this->assertTrue(is_callable([$einvoice, 'validatePayload']), 'Implement EInvoice::validatePayload() to satisfy this contract.');
        $errors = $einvoice->validatePayload($payload, $class, $groups);
        $this->assertInstanceOf(ConstraintViolationListInterface::class, $errors);

        return $errors;
    }

    public function testAttributesAreEnforcedWithDefaultGroups(): void
    {
        $errors = $this->validatePayload(['value' => ''], RequiredPayload::class);
        $this->assertCount(1, $errors);
        $this->assertSame('value', $errors[0]->getPropertyPath());
        $this->assertSame(Assert\NotBlank::IS_BLANK_ERROR, $errors[0]->getCode());
        $this->assertNotSame('', $errors[0]->getMessage());
    }

    public function testValidPayloadReturnsAnEmptyViolationList(): void
    {
        $this->assertCount(0, $this->validatePayload(['value' => '00123'], RequiredPayload::class));
    }

    public function testExplicitGroupsExcludeUnrelatedRequiredFields(): void
    {
        $this->assertCount(0, $this->validatePayload(['reference' => '00123'], GroupedPayload::class, ['invoice_settings']));
        $errors = $this->validatePayload(['reference' => ''], GroupedPayload::class, ['invoice_settings']);
        $this->assertCount(1, $errors);
        $this->assertSame('reference', $errors[0]->getPropertyPath());
        $this->assertSame(Assert\NotBlank::IS_BLANK_ERROR, $errors[0]->getCode());
    }

    public function testMultipleViolationsOnOnePropertyAreRetained(): void
    {
        $errors = $this->validatePayload([], MultipleConstraintsPayload::class);
        $actual = [];
        foreach ($errors as $error) {
            $actual[] = [$error->getPropertyPath(), $error->getCode()];
        }
        $this->assertEqualsCanonicalizing([
            ['value', Assert\NotNull::IS_NULL_ERROR],
            ['value', Assert\NotBlank::IS_BLANK_ERROR],
        ], $actual);
    }

    public function testTypeErrorHasAPropertyPath(): void
    {
        $errors = $this->validatePayload(['value' => []], RequiredPayload::class);
        $this->assertCount(1, $errors);
        $this->assertSame('value', $errors[0]->getPropertyPath());
        $this->assertNotSame('', $errors[0]->getMessage());
    }

    public static function validSettings(): array
    {
        return [
            'empty settings' => [[]],
            'buyer reference only' => [['BuyerReference' => '0010']],
            'unknown key remains tolerated' => [['UnknownField' => 'ignored', 'BuyerReference' => '0010']],
            'references without generated invoice fields' => [[
                'ProjectReference' => [['ID' => ['value' => '0011']]],
                'ContractDocumentReference' => [['ID' => ['value' => '0012']]],
                'OrderReference' => ['ID' => ['value' => '0013']],
                'InvoiceLine' => [
                    ['OrderLineReference' => [['LineID' => ['value' => '0001']]]],
                    ['OrderLineReference' => [['LineID' => ['value' => '0002']]]],
                ],
            ]],
            'relative date pair' => [['InvoicePeriod' => [['Description' => 'first day of this month|last day of this month']]]],
        ];
    }

    #[DataProvider('validSettings')]
    public function testPartialSettingsPass(array $payload): void
    {
        $this->assertCount(0, $this->validatePayload($payload, InvoiceSettingsProfile::class, ['invoice_settings']));
    }

    public static function blankReferences(): array
    {
        return [
            'order' => [['OrderReference' => ['ID' => ['value' => '']]], 'OrderReference.ID.value'],
            'second project' => [['ProjectReference' => [['ID' => ['value' => '001']], ['ID' => ['value' => '']]]], 'ProjectReference[1].ID.value'],
            'second contract' => [['ContractDocumentReference' => [['ID' => ['value' => '001']], ['ID' => ['value' => '']]]], 'ContractDocumentReference[1].ID.value'],
            'second order line on second invoice line' => [[
                'OrderReference' => ['ID' => ['value' => '0013']],
                'InvoiceLine' => [
                    ['OrderLineReference' => [['LineID' => ['value' => '001']]]],
                    ['OrderLineReference' => [['LineID' => ['value' => '002']], ['LineID' => ['value' => '']]]],
                ],
            ], 'InvoiceLine[1].OrderLineReference[1].LineID.value'],
        ];
    }

    #[DataProvider('blankReferences')]
    public function testPresentReferenceMustHaveANonblankValue(array $payload, string $path): void
    {
        $errors = $this->validatePayload($payload, InvoiceSettingsProfile::class, ['invoice_settings']);
        $this->assertCount(1, $errors);
        $this->assertSame($path, $errors[0]->getPropertyPath());
        $this->assertSame(Assert\NotBlank::IS_BLANK_ERROR, $errors[0]->getCode());
        $this->assertSame('Enter a value.', $errors[0]->getMessage());
    }

    public function testNestedTypeErrorRetainsCollectionIndex(): void
    {
        $errors = $this->validatePayload([
            'ProjectReference' => [['ID' => ['value' => '001']], ['ID' => ['value' => []]]],
        ], InvoiceSettingsProfile::class, ['invoice_settings']);
        $this->assertCount(1, $errors);
        $this->assertSame('ProjectReference[1].ID.value', $errors[0]->getPropertyPath());
        $this->assertNotSame('', $errors[0]->getMessage());
    }

    public static function invalidPeriods(): array
    {
        return [
            'missing end' => ['first day of this month'],
            'invalid start' => ['not-a-date|last day of this month'],
            'invalid end' => ['first day of this month|not-a-date'],
        ];
    }

    #[DataProvider('invalidPeriods')]
    public function testEveryPeriodIsValidatedWithAStableCode(string $description): void
    {
        $payload = ['InvoicePeriod' => [
            ['Description' => 'first day of this month|last day of this month'],
            ['Description' => $description],
        ]];
        $errors = $this->validatePayload($payload, InvoiceSettingsProfile::class, ['invoice_settings']);
        $this->assertCount(1, $errors);
        $this->assertSame('InvoicePeriod[1].Description', $errors[0]->getPropertyPath());
        $this->assertNotEmpty($errors[0]->getCode());
        $this->assertNotSame('', $errors[0]->getMessage());

        $payload['InvoicePeriod'] = [$payload['InvoicePeriod'][1]];
        $first_errors = $this->validatePayload($payload, InvoiceSettingsProfile::class, ['invoice_settings']);
        $this->assertCount(1, $first_errors);
        $this->assertSame('InvoicePeriod[0].Description', $first_errors[0]->getPropertyPath());
        $this->assertSame($errors[0]->getCode(), $first_errors[0]->getCode());
        $this->assertSame(
            $description === 'first day of this month'
                ? 'Enter a start and end date separated by |.'
                : 'Enter a valid date expression on each side of |.',
            $errors[0]->getMessage(),
        );
    }

    public function testSharedReferenceAttributesEnforceSettingsGroup(): void
    {
        // This exercises the actual nested model even before validatePayload exists.
        $invoice = (new EInvoice())->decode('Peppol', '{"OrderReference":{"ID":{"value":""}}}');
        $validator = \Symfony\Component\Validator\Validation::createValidatorBuilder()->enableAttributeMapping()->getValidator();
        $errors = $validator->validate($invoice->OrderReference, null, ['invoice_settings']);
        $this->assertCount(1, $errors);
        $this->assertSame('ID.value', $errors[0]->getPropertyPath());
        $this->assertSame(Assert\NotBlank::IS_BLANK_ERROR, $errors[0]->getCode());
    }

    public function testDenormalizationPreservesReferenceValues(): void
    {
        $invoice = (new EInvoice())->denormalize([
            'BuyerReference' => '0010',
            'OrderReference' => ['ID' => ['value' => '0013']],
        ], \InvoiceNinja\EInvoice\Models\Peppol\Invoice::class);
        $this->assertTrue(isset($invoice->BuyerReference), 'Denormalization must not drop supplied properties.');
        $this->assertSame('0010', $invoice->BuyerReference);
        $this->assertSame('0013', $invoice->OrderReference->ID->value);
    }

    public static function malformedSettings(): array
    {
        return [
            'missing order identifier' => [['OrderReference' => []], 'OrderReference.ID', Assert\NotBlank::IS_BLANK_ERROR],
            'missing identifier value' => [['OrderReference' => ['ID' => []]], 'OrderReference.ID.value', Assert\NotBlank::IS_BLANK_ERROR],
            'explicit null buyer reference' => [['BuyerReference' => null], 'BuyerReference', 'einvoice.denormalization.invalid_type'],
            'invalid period date' => [['InvoicePeriod' => [['StartDate' => 'not-a-date']]], 'InvoicePeriod[0].StartDate', 'einvoice.denormalization.invalid_type'],
        ];
    }

    #[DataProvider('malformedSettings')]
    public function testMalformedSettingsHavePreciseErrors(array $payload, string $path, string $code): void
    {
        $errors = $this->validatePayload($payload, InvoiceSettingsProfile::class, ['invoice_settings']);
        $this->assertCount(1, $errors);
        $this->assertSame($path, $errors[0]->getPropertyPath());
        $this->assertSame($code, $errors[0]->getCode());
    }

    public function testUnknownTargetClassIsAConfigurationError(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        (new EInvoice())->validatePayload([], 'NonexistentValidationProfile');
    }

    public static function relativeDateCompatibilityCases(): array
    {
        return [
            'empty' => ['', null],
            'short placeholder' => ['ab', null],
            'extra separator' => ['today|tomorrow|yesterday', \InvoiceNinja\EInvoice\Validation\Constraints\RelativeDateExpression::PAIR_REQUIRED_ERROR],
            'invalid date' => ['not-a-date|today', \InvoiceNinja\EInvoice\Validation\Constraints\RelativeDateExpression::INVALID_DATE_ERROR],
        ];
    }

    #[DataProvider('relativeDateCompatibilityCases')]
    public function testRelativeDateCompatibility(string $description, ?string $code): void
    {
        $errors = $this->validatePayload(['InvoicePeriod' => [['Description' => $description]]], InvoiceSettingsProfile::class, ['invoice_settings']);
        $this->assertCount($code === null ? 0 : 1, $errors);
        if ($code !== null) {
            $this->assertSame('InvoicePeriod[0].Description', $errors[0]->getPropertyPath());
            $this->assertSame($code, $errors[0]->getCode());
        }
    }

    public function testRelativeDateRuleDoesNotApplyToDefaultDocumentValidation(): void
    {
        $period = new \InvoiceNinja\EInvoice\Models\Peppol\PeriodType\InvoicePeriod();
        $period->Description = 'Ordinary document period description';
        $validator = \Symfony\Component\Validator\Validation::createValidatorBuilder()->enableAttributeMapping()->getValidator();
        $this->assertCount(0, $validator->validate($period));
    }
}

// Small fixtures isolate the pipeline from the real profile and its nested constraints.
class RequiredPayload
{
    #[Assert\NotBlank]
    public string $value;
}

class GroupedPayload
{
    #[Assert\NotBlank]
    public ?string $generated_id = null;

    #[Assert\NotBlank(groups: ['invoice_settings'])]
    public string $reference;
}

class MultipleConstraintsPayload
{
    #[Assert\NotNull]
    #[Assert\NotBlank]
    public ?string $value = null;
}
