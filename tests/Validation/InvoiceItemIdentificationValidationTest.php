<?php

namespace InvoiceNinja\EInvoice\Tests\Validation;

use InvoiceNinja\EInvoice\EInvoice;
use InvoiceNinja\EInvoice\Tests\Support\TestLogger;
use InvoiceNinja\EInvoice\Validation\ValidationResultFormatter;
use InvoiceNinja\EInvoice\Validation\Profiles\InvoiceSettingsProfile;
use InvoiceNinja\EInvoice\Validation\ValidationGroups;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class InvoiceItemIdentificationValidationTest extends TestCase
{
    private static function payload(): array
    {
        return ['Invoice' => [
            'InvoiceLine' => [
                [
                    'Item' => [
                        'BuyersItemIdentification' => ['ID' => ['value' => '1']],
                        'SellersItemIdentification' => ['ID' => ['value' => '2']],
                    ],
                    'OrderLineReference' => [['LineID' => ['value' => '3']]],
                ],
                [
                    'Item' => [
                        'BuyersItemIdentification' => ['ID' => ['value' => 'a']],
                        'SellersItemIdentification' => ['ID' => ['value' => 'b']],
                    ],
                    'OrderLineReference' => [['LineID' => ['value' => 'c']]],
                ],
                ['Item' => ['BuyersItemIdentification' => ['ID' => ['value' => 'f']]]],
            ],
            'OrderReference' => ['ID' => ['value' => '45555']],
        ]];
    }

    private function validate(array $payload): ConstraintViolationListInterface
    {
        $validation_result = (new EInvoice())->validatePayload(
            $payload['Invoice'],
            InvoiceSettingsProfile::class,
            [ValidationGroups::INVOICE_SETTINGS],
        );

        TestLogger::get()->debug('Payload validation result', ValidationResultFormatter::format($validation_result));
        
        return $validation_result;
    }

    public function testProvidedPayloadPasses(): void
    {
        $this->assertCount(0, $this->validate(self::payload()));
    }

    public static function invalidPayloads(): iterable
    {
        foreach (['BuyersItemIdentification', 'SellersItemIdentification'] as $field) {
            foreach ([
                'missing ID' => [[], '.ID', NotBlank::IS_BLANK_ERROR],
                'null ID' => [['ID' => null], '.ID.value', NotBlank::IS_BLANK_ERROR],
                'missing value' => [['ID' => []], '.ID.value', NotBlank::IS_BLANK_ERROR],
                'blank value' => [['ID' => ['value' => '']], '.ID.value', NotBlank::IS_BLANK_ERROR],
                'invalid value type' => [['ID' => ['value' => []]], '.ID.value', 'einvoice.denormalization.invalid_type'],
            ] as $case => [$identification, $suffix, $code]) {
                $payload = self::payload();
                $payload['Invoice']['InvoiceLine'][1]['Item'][$field] = $identification;
                yield "$field: $case" => [$payload, "InvoiceLine[1].Item.$field$suffix", $code];
            }
        }

        $payload = self::payload();
        $payload['Invoice']['InvoiceLine'][2]['Item']['BuyersItemIdentification']['ID']['value'] = '';
        yield 'third line buyer ID' => [$payload, 'InvoiceLine[2].Item.BuyersItemIdentification.ID.value', NotBlank::IS_BLANK_ERROR];

        $payload = self::payload();
        $payload['Invoice']['InvoiceLine'][1]['OrderLineReference'][0]['LineID']['value'] = '';
        yield 'order line ID' => [$payload, 'InvoiceLine[1].OrderLineReference[0].LineID.value', NotBlank::IS_BLANK_ERROR];

        $payload = self::payload();
        $payload['Invoice']['OrderReference']['ID']['value'] = '';
        yield 'order ID' => [$payload, 'OrderReference.ID.value', NotBlank::IS_BLANK_ERROR];
    }

    #[DataProvider('invalidPayloads')]
    public function testInvalidVariantsReturnPreciseErrors(array $payload, string $path, string $code): void
    {
        $errors = $this->validate($payload);
        $this->assertCount(1, $errors);
        $this->assertSame($path, $errors[0]->getPropertyPath());
        $this->assertSame($code, $errors[0]->getCode());
        $this->assertNotSame('', $errors[0]->getMessage());
        if ($code === NotBlank::IS_BLANK_ERROR) {
            $this->assertSame('Enter a value.', $errors[0]->getMessage());
        }
    }

    public function testErrorsAcrossMultipleLinesAreReturnedTogether(): void
    {
        $payload = self::payload();
        $payload['Invoice']['InvoiceLine'][0]['Item']['SellersItemIdentification']['ID']['value'] = '';
        $payload['Invoice']['InvoiceLine'][2]['Item']['BuyersItemIdentification']['ID']['value'] = '';
        $errors = $this->validate($payload);
        $this->assertCount(2, $errors);
        $paths = [];
        foreach ($errors as $error) {
            $paths[] = $error->getPropertyPath();
            $this->assertSame(NotBlank::IS_BLANK_ERROR, $error->getCode());
        }
        $this->assertEqualsCanonicalizing([
            'InvoiceLine[0].Item.SellersItemIdentification.ID.value',
            'InvoiceLine[2].Item.BuyersItemIdentification.ID.value',
        ], $paths);
    }
}
