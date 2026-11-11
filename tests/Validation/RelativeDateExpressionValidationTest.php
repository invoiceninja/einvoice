<?php

namespace InvoiceNinja\EInvoice\Tests\Validation;

use InvoiceNinja\EInvoice\EInvoice;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\InvoicePeriod;
use InvoiceNinja\EInvoice\Validation\Constraints\RelativeDateExpression;
use InvoiceNinja\EInvoice\Validation\ValidationGroups;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class RelativeDateExpressionValidationTest extends TestCase
{
    #[DataProvider('invalidDateExpressions')]
    public function testViolationIdentifiesTheInvalidDateField(string $description, string $expected_field): void
    {
        $errors = (new EInvoice())->validatePayload(
            ['Description' => $description],
            InvoicePeriod::class,
            [ValidationGroups::INVOICE_SETTINGS]
        );

        $this->assertCount(1, $errors);
        $this->assertSame('Description', $errors[0]->getPropertyPath());
        $this->assertSame(RelativeDateExpression::INVALID_DATE_ERROR, $errors[0]->getCode());
        $this->assertSame($expected_field, $errors[0]->getParameters()['{{ field }}'] ?? null);
    }

    public static function invalidDateExpressions(): iterable
    {
        yield 'invalid start' => ['not-a-date|tomorrow', 'StartDate'];
        yield 'invalid end' => ['today|not-a-date', 'EndDate'];
    }
}
