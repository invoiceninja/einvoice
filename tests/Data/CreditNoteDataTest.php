<?php

namespace InvoiceNinja\EInvoice\Tests\Data;

use InvoiceNinja\EInvoice\EInvoice;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;
use InvoiceNinja\EInvoice\Models\Peppol\CreditNote;
use InvoiceNinja\EInvoice\Models\Peppol\CreditNoteLine;
use InvoiceNinja\EInvoice\Models\Peppol\CreditNoteLineType\CreditNoteLine as CreditNoteLineType;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CreditNoteTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\CreditedQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\Party;
use InvoiceNinja\EInvoice\Models\Peppol\SupplierPartyType\AccountingSupplierParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyIdentificationType\PartyIdentification;

class CreditNoteDataTest extends TestCase
{

    public function setUp(): void
    {
    }

    public function testCreditNoteDecode()
    {
        $f = 'tests/Data/samples/creditnote1.xml';
        $e = new EInvoice();
        $creditNote = $e->decode('Peppol', file_get_contents($f), 'xml');
        
        $this->assertObjectHasProperty('UBLVersionID', $creditNote);
        $this->assertInstanceOf(CreditNote::class, $creditNote);
        $this->assertEquals("CN-321827", $creditNote->ID->value ?? $creditNote->ID);

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $errors = $validator->validate($creditNote);

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                // Uncomment for debugging
                // echo $error->getPropertyPath() . ': ' . $error->getMessage() . "\n";
            }
        }

        $this->assertCount(0, $errors);

        $this->assertInstanceOf(AccountingSupplierParty::class, $creditNote->AccountingSupplierParty);
        $this->assertInstanceOf(Party::class, $creditNote->AccountingSupplierParty->Party);
        $this->assertInstanceOf(PartyIdentification::class, $creditNote->AccountingSupplierParty->Party->PartyIdentification[0]);
    }

    public function testCreditNoteLineStructure()
    {
        $f = 'tests/Data/samples/creditnote1.xml';
        $e = new EInvoice();
        $creditNote = $e->decode('Peppol', file_get_contents($f), 'xml');
        
        $this->assertIsArray($creditNote->CreditNoteLine);
        $this->assertNotEmpty($creditNote->CreditNoteLine);
        // CreditNoteLine can be either CreditNoteLine or CreditNoteLineType\CreditNoteLine
        $this->assertTrue(
            $creditNote->CreditNoteLine[0] instanceof CreditNoteLine || 
            $creditNote->CreditNoteLine[0] instanceof CreditNoteLineType
        );
        
        $line = $creditNote->CreditNoteLine[0];
        $this->assertObjectHasProperty('ID', $line);
        $this->assertObjectHasProperty('CreditedQuantity', $line);
        $this->assertObjectHasProperty('LineExtensionAmount', $line);
        
        if ($line->CreditedQuantity) {
            $this->assertInstanceOf(CreditedQuantity::class, $line->CreditedQuantity);
        }
    }

    public function testCreditNoteTypeCode()
    {
        $f = 'tests/Data/samples/creditnote1.xml';
        $e = new EInvoice();
        $creditNote = $e->decode('Peppol', file_get_contents($f), 'xml');
        
        $this->assertObjectHasProperty('CreditNoteTypeCode', $creditNote);
        
        if ($creditNote->CreditNoteTypeCode) {
            $this->assertInstanceOf(CreditNoteTypeCode::class, $creditNote->CreditNoteTypeCode);
        }
    }

    public function testCreditNoteJsonDecode()
    {
        $json = '{"ID":"CN-ROCKER","CreditNoteTypeCode":{"value":"381"},"Note":"Credit Note NOTE","CreditNoteLine":[{"ID":"1","CreditedQuantity":{"amount":"10","unitCode":"H87"},"LineExtensionAmount":{"amount":"100","currencyID":"EUR"},"Item":{"Description":"Test Item","Name":"Test Product"}}]}';
    
        $e = new EInvoice();
        $result = $e->decode('Peppol', $json, 'json');

        $this->assertInstanceOf(CreditNote::class, $result);
        $this->assertObjectHasProperty('CreditNoteLine', $result);
        $this->assertIsArray($result->CreditNoteLine);
        $this->assertNotEmpty($result->CreditNoteLine);
    }

    public function testCreditNoteEncode()
    {
        $f = 'tests/Data/samples/creditnote1.xml';
        $e = new EInvoice();
        $creditNote = $e->decode('Peppol', file_get_contents($f), 'xml');
        
        $encoded = $e->encode($creditNote, 'xml');
        
        $this->assertIsString($encoded);
        $this->assertStringContainsString('CreditNote', $encoded);
        $this->assertStringContainsString('CreditNoteLine', $encoded);
        $this->assertStringContainsString('CreditedQuantity', $encoded);
    }

    public function testCreditNoteValidation()
    {
        $f = 'tests/Data/samples/creditnote1.xml';
        $e = new EInvoice();
        $creditNote = $e->decode('Peppol', file_get_contents($f), 'xml');
        
        $errors = $e->validate($creditNote);
        
        $this->assertIsArray($errors);
        // Should have no validation errors for a valid credit note
        $this->assertCount(0, $errors);
    }

    public function testCreditNoteAutoDetection()
    {
        // Test XML detection
        $xml = '<?xml version="1.0"?><CreditNote xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2"><cbc:ID>CN-123</cbc:ID><cbc:IssueDate>2024-01-01</cbc:IssueDate><cac:AccountingSupplierParty><cac:Party><cac:PartyIdentification><cbc:ID>123</cbc:ID></cac:PartyIdentification></cac:Party></cac:AccountingSupplierParty><cac:AccountingCustomerParty><cac:Party><cac:PartyIdentification><cbc:ID>456</cbc:ID></cac:PartyIdentification></cac:Party></cac:AccountingCustomerParty><cac:LegalMonetaryTotal><cbc:PayableAmount currencyID="EUR">100</cbc:PayableAmount></cac:LegalMonetaryTotal><cac:CreditNoteLine><cbc:ID>1</cbc:ID><cbc:LineExtensionAmount currencyID="EUR">100</cbc:LineExtensionAmount><cac:Item><cbc:Description>Test</cbc:Description></cac:Item></cac:CreditNoteLine></CreditNote>';
        
        $e = new EInvoice();
        $creditNote = $e->decode('Peppol', $xml, 'xml');
        
        $this->assertInstanceOf(CreditNote::class, $creditNote);
        
        // Test JSON detection
        $json = '{"ID":"CN-123","CreditNoteTypeCode":{"value":"381"},"IssueDate":"2024-01-01","AccountingSupplierParty":{"Party":{"PartyIdentification":[{"ID":"123"}]}},"AccountingCustomerParty":{"Party":{"PartyIdentification":[{"ID":"456"}]}},"LegalMonetaryTotal":{"PayableAmount":{"amount":"100","currencyID":"EUR"}},"CreditNoteLine":[{"ID":"1","LineExtensionAmount":{"amount":"100","currencyID":"EUR"},"Item":{"Description":"Test"}}]}';
        
        $creditNoteJson = $e->decode('Peppol', $json, 'json');
        
        $this->assertInstanceOf(CreditNote::class, $creditNoteJson);
    }

    public function testCreditNoteXSDValidation()
    {
        $f = 'tests/Data/samples/creditnote1.xml';

        libxml_use_internal_errors(true);

        $dom = new \DOMDocument();
        $dom->load($f);

        $validation = $dom->schemaValidate("src/Standards/FACT1/UBL-CreditNote-2.1.xsd");

        $errors = libxml_get_errors();

        $this->assertIsArray($errors);
        // Uncomment to see validation errors
        // if(count($errors) > 0) {
        //     foreach($errors as $error) {
        //         echo $error->message . "\n";
        //     }
        // }
    }
}
