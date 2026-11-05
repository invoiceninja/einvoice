<?php

namespace InvoiceNinja\EInvoice\Tests\Validation;

use InvoiceNinja\EInvoice\EInvoice;
use InvoiceNinja\EInvoice\Models\Peppol\Invoice;
use PHPUnit\Framework\TestCase;

/** Legacy request acceptance retained while consumers migrate to the opt-in API. */
class LegacyValidationCompatibilityTest extends TestCase
{
    public function testRequestValidationCurrentlyAcceptsEmptyAndUnknownFields(): void
    {
        $einvoice = new EInvoice();
        $this->assertSame([], $einvoice->validateRequest([], Invoice::class));
        $this->assertSame([], $einvoice->validateRequest(['UnknownField' => 'ignored'], Invoice::class));
        $this->assertSame([], $einvoice->validateRequest(['BuyerReference' => '00123'], Invoice::class));
    }

}
