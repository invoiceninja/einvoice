<?php

namespace InvoiceNinja\EInvoice\Tests\Validation;

use InvoiceNinja\EInvoice\EInvoice;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\Delivery;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\InvoicePeriod;
use InvoiceNinja\EInvoice\Validation\Profiles\InvoiceSettingsProfile;
use InvoiceNinja\EInvoice\Validation\ValidationGroups;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

class InvoiceDateValidationTest extends TestCase
{
    #[DataProvider('validPeriods')]
    public function testOptionalPeriodDatesAndValidRangesPass(array $period): void
    {
        $einvoice = new EInvoice();

        $this->assertCount(0, $einvoice->validatePayload($period, InvoicePeriod::class));
        $this->assertCount(0, $einvoice->validatePayload(
            ['InvoicePeriod' => [$period]],
            InvoiceSettingsProfile::class,
            [ValidationGroups::INVOICE_SETTINGS]
        ));
    }

    public static function validPeriods(): iterable
    {
        yield 'omitted' => [[]];
        yield 'both null' => [['StartDate' => null, 'EndDate' => null]];
        yield 'start only' => [['StartDate' => '2026-10-01']];
        yield 'end only' => [['EndDate' => '2026-10-31']];
        yield 'null start' => [['StartDate' => null, 'EndDate' => '2026-10-31']];
        yield 'null end' => [['StartDate' => '2026-10-01', 'EndDate' => null]];
        yield 'forward range' => [['StartDate' => '2026-10-01', 'EndDate' => '2026-10-31']];
        yield 'same day' => [['StartDate' => '2026-10-01', 'EndDate' => '2026-10-01']];
        yield 'leap day' => [['StartDate' => '2028-02-29', 'EndDate' => '2028-02-29']];
    }

    public function testReversedPeriodFailsInDefaultAndSettingsGroups(): void
    {
        $einvoice = new EInvoice();
        $period = ['StartDate' => '2026-10-31', 'EndDate' => '2026-10-01'];

        $errors = $einvoice->validatePayload($period, InvoicePeriod::class);
        $this->assertCount(1, $errors);
        $this->assertSame('EndDate', $errors[0]->getPropertyPath());
        $this->assertSame(GreaterThanOrEqual::TOO_LOW_ERROR, $errors[0]->getCode());

        $errors = $einvoice->validatePayload([
            'InvoicePeriod' => [[], $period],
        ], InvoiceSettingsProfile::class, [ValidationGroups::INVOICE_SETTINGS]);
        $this->assertCount(1, $errors);
        $this->assertSame('InvoicePeriod[1].EndDate', $errors[0]->getPropertyPath());
        $this->assertSame(GreaterThanOrEqual::TOO_LOW_ERROR, $errors[0]->getCode());
    }

    #[DataProvider('invalidDates')]
    public function testInvalidPeriodAndDeliveryDatesAreRejected(mixed $date): void
    {
        $einvoice = new EInvoice();

        foreach (['StartDate', 'EndDate'] as $field) {
            $errors = $einvoice->validatePayload([$field => $date], InvoicePeriod::class);
            $this->assertCount(1, $errors);
            $this->assertSame($field, $errors[0]->getPropertyPath());
        }

        $errors = $einvoice->validatePayload(['ActualDeliveryDate' => $date], Delivery::class);
        $this->assertCount(1, $errors);
        $this->assertSame('ActualDeliveryDate', $errors[0]->getPropertyPath());
    }

    public static function invalidDates(): iterable
    {
        yield 'unparseable' => ['invalid'];
        yield 'calendar overflow' => ['2026-02-30'];
        yield 'non-leap February 29' => ['2026-02-29'];
        yield 'missing zero padding' => ['2026-2-03'];
        yield 'timestamp' => ['2026-10-01T12:00:00+00:00'];
        yield 'empty string' => [''];
        yield 'wrong type' => [[]];
    }

    #[DataProvider('validDeliveryDates')]
    public function testOptionalActualDeliveryDatePasses(array $delivery): void
    {
        $einvoice = new EInvoice();

        $this->assertCount(0, $einvoice->validatePayload($delivery, Delivery::class));
        $this->assertCount(0, $einvoice->validatePayload(
            ['Delivery' => [$delivery]],
            InvoiceSettingsProfile::class,
            [ValidationGroups::INVOICE_SETTINGS]
        ));
    }

    public static function validDeliveryDates(): iterable
    {
        yield 'omitted' => [[]];
        yield 'null' => [['ActualDeliveryDate' => null]];
        yield 'valid date' => [['ActualDeliveryDate' => '2026-10-31']];
        yield 'leap day' => [['ActualDeliveryDate' => '2028-02-29']];
    }

    public function testInvalidDeliveryDateInSettingsRetainsCollectionIndex(): void
    {
        $errors = (new EInvoice())->validatePayload([
            'Delivery' => [[], ['ActualDeliveryDate' => '2026-02-30']],
        ], InvoiceSettingsProfile::class, [ValidationGroups::INVOICE_SETTINGS]);

        $this->assertCount(1, $errors);
        $this->assertSame('Delivery[1].ActualDeliveryDate', $errors[0]->getPropertyPath());
    }

    public function testNullDatesAreOmittedWhenEncoded(): void
    {
        $einvoice = new EInvoice();
        $period = $einvoice->denormalize(['StartDate' => null, 'EndDate' => null], InvoicePeriod::class);
        $delivery = $einvoice->denormalize(['ActualDeliveryDate' => null], Delivery::class);

        $this->assertStringNotContainsString('StartDate', $einvoice->encode($period, 'json'));
        $this->assertStringNotContainsString('EndDate', $einvoice->encode($period, 'json'));
        $this->assertStringNotContainsString('ActualDeliveryDate', $einvoice->encode($delivery, 'json'));
    }
}
