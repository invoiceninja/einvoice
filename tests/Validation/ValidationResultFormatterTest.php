<?php

namespace InvoiceNinja\EInvoice\Tests\Validation;

use InvoiceNinja\EInvoice\EInvoice;
use InvoiceNinja\EInvoice\Validation\Profiles\InvoiceSettingsProfile;
use InvoiceNinja\EInvoice\Validation\ValidationGroups;
use InvoiceNinja\EInvoice\Validation\ValidationResultFormatter;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Validation;

class ValidationResultFormatterTest extends TestCase
{
    public function testSuccessHasAnExplicitEmptyErrorList(): void
    {
        $this->assertSame(['valid' => true, 'errors' => []], ValidationResultFormatter::format(new ConstraintViolationList()));
    }

    public function testNestedErrorsPreserveConstraintMessagesPathsAndCodes(): void
    {
        $errors = (new EInvoice())->validatePayload([
            'InvoiceLine' => [
                [],
                ['Item' => ['BuyersItemIdentification' => ['ID' => ['value' => '']]]],
                ['Item' => ['SellersItemIdentification' => []]],
            ],
        ], InvoiceSettingsProfile::class, [ValidationGroups::INVOICE_SETTINGS]);

        $this->assertSame([
            'valid' => false,
            'errors' => [
                [
                    'path' => 'InvoiceLine[1].Item.BuyersItemIdentification.ID.value',
                    'code' => NotBlank::IS_BLANK_ERROR,
                    'message' => 'Enter a value.',
                ],
                [
                    'path' => 'InvoiceLine[2].Item.SellersItemIdentification.ID',
                    'code' => NotBlank::IS_BLANK_ERROR,
                    'message' => 'Enter a value.',
                ],
            ],
        ], ValidationResultFormatter::format($errors));
    }

    public function testFormatterDoesNotRewriteHydrationErrors(): void
    {
        $errors = (new EInvoice())->validatePayload([
            'OrderReference' => ['ID' => ['value' => []]],
        ], InvoiceSettingsProfile::class, [ValidationGroups::INVOICE_SETTINGS]);
        $result = ValidationResultFormatter::format($errors);
        $this->assertFalse($result['valid']);
        $this->assertSame([[
            'path' => 'OrderReference.ID.value',
            'code' => 'einvoice.denormalization.invalid_type',
            'message' => $errors[0]->getMessage(),
        ]], $result['errors']);
    }

    public function testOrderLineMessageIsPreservedWithoutAddedContext(): void
    {
        $errors = new ConstraintViolationList([
            new ConstraintViolation('Internal message', null, [], null, 'InvoiceLine[1].OrderLineReference[0].LineID.value', '', null, NotBlank::IS_BLANK_ERROR),
        ]);
        $this->assertSame('Internal message', ValidationResultFormatter::format($errors)['errors'][0]['message']);
    }

    public function testUnknownErrorsPreserveMessagesAndCanBeCustomized(): void
    {
        $errors = new ConstraintViolationList([
            new ConstraintViolation('Internal implementation detail', null, [], null, 'OtherField', null, null, 'custom.code'),
        ]);
        $this->assertSame('Internal implementation detail', ValidationResultFormatter::format($errors)['errors'][0]['message']);

        $result = ValidationResultFormatter::format($errors, function ($error, string $suggested): string {
            $this->assertSame('OtherField', $error->getPropertyPath());
            $this->assertSame('Internal implementation detail', $suggested);
            return 'Please check your reference.';
        });
        $this->assertSame('Please check your reference.', $result['errors'][0]['message']);
        $this->assertSame('custom.code', $result['errors'][0]['code']);
        $this->assertSame('Internal implementation detail', $errors[0]->getMessage());
    }

    public function testNativeAttributeMessageParametersArePreserved(): void
    {
        $errors = Validation::createValidatorBuilder()->enableAttributeMapping()->getValidator()
            ->validate(new MessageParameterPayload());
        $this->assertCount(1, $errors);
        $this->assertSame('Enter no more than 3 characters.', $errors[0]->getMessage());
        $this->assertSame([
            'valid' => false,
            'errors' => [[
                'path' => 'reference',
                'code' => Length::TOO_LONG_ERROR,
                'message' => 'Enter no more than 3 characters.',
            ]],
        ], ValidationResultFormatter::format($errors));
    }
}

class MessageParameterPayload
{
    #[Length(max: 3, maxMessage: 'Enter no more than {{ limit }} characters.')]
    public string $reference = '1234';
}
