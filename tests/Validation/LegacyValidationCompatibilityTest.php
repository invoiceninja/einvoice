<?php

namespace InvoiceNinja\EInvoice\Tests\Validation;

use InvoiceNinja\EInvoice\EInvoice;
use InvoiceNinja\EInvoice\Models\Peppol\Invoice;
use InvoiceNinja\EInvoice\Models\Peppol\CreditNote;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;

/** Characterizes legacy gaps, not the contract for the future opt-in validation API. */
class LegacyValidationCompatibilityTest extends TestCase
{
    public function testObjectValidationCurrentlyIgnoresRequiredAttributes(): void
    {
        $einvoice = new EInvoice();
        foreach ([new Invoice(), new CreditNote()] as $document) {
            $this->assertSame([], $einvoice->validate($document));
        }
    }

    public function testRequestValidationCurrentlyAcceptsEmptyAndUnknownFields(): void
    {
        $einvoice = new EInvoice();
        $this->assertSame([], $einvoice->validateRequest([], Invoice::class));
        $this->assertSame([], $einvoice->validateRequest(['UnknownField' => 'ignored'], Invoice::class));
        $this->assertSame([], $einvoice->validateRequest(['BuyerReference' => '00123'], Invoice::class));
    }

    public function testRequestTypeErrorsCurrentlyHaveNoPathOrCode(): void
    {
        $errors = (new EInvoice())->validateRequest(['BuyerReference' => []], Invoice::class);
        $this->assertInstanceOf(ConstraintViolationList::class, $errors);
        $this->assertCount(1, $errors);
        $this->assertSame('', $errors[0]->getPropertyPath());
        $this->assertNull($errors[0]->getCode());
        $this->assertStringContainsString('BuyerReference', $errors[0]->getMessage());
    }

    public function testDenormalizeCurrentlyDropsSuppliedValues(): void
    {
        $invoice = (new EInvoice())->denormalize(['BuyerReference' => '00123'], Invoice::class);
        $this->assertInstanceOf(Invoice::class, $invoice);
        $this->assertFalse(isset($invoice->BuyerReference));
    }

    public function testOptionalReferenceCurrentlyDoesNotCascade(): void
    {
        $einvoice = new EInvoice();
        $invoice = $einvoice->decode('Peppol', file_get_contents('tests/Data/samples/fact1.xml'), 'xml');
        $invoice->OrderReference = new \InvoiceNinja\EInvoice\Models\Peppol\OrderReferenceType\OrderReference();
        $validator = Validation::createValidatorBuilder()->enableAttributeMapping()->getValidator();
        $this->assertCount(0, $validator->validate($invoice));
        $errors = $validator->validate($invoice->OrderReference);
        $this->assertCount(2, $errors);
        $this->assertSame('ID', $errors[0]->getPropertyPath());
        $this->assertSame(\Symfony\Component\Validator\Constraints\NotNull::IS_NULL_ERROR, $errors[0]->getCode());
        $this->assertSame('ID', $errors[1]->getPropertyPath());
        $this->assertSame(\Symfony\Component\Validator\Constraints\NotBlank::IS_BLANK_ERROR, $errors[1]->getCode());
    }

    public function testScalarJsonIdentifierCurrentlyLosesItsValue(): void
    {
        $invoice = (new EInvoice())->decode('Peppol', '{"ID":"00123"}');
        $this->assertInstanceOf(\InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID::class, $invoice->ID);
        $this->assertFalse(isset($invoice->ID->value));
    }

    public function testIdentifierWrapperCurrentlyAcceptsBlankValue(): void
    {
        $invoice = (new EInvoice())->decode('Peppol', '{"OrderReference":{"ID":{"value":""}}}');
        $validator = Validation::createValidatorBuilder()->enableAttributeMapping()->getValidator();
        $this->assertSame('', $invoice->OrderReference->ID->value);
        $this->assertCount(0, $validator->validate($invoice->OrderReference));
    }
}
