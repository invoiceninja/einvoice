<?php

namespace InvoiceNinja\EInvoice\Tests\Validation;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class SchemaValidationTest extends TestCase
{
    public static function documents(): array
    {
        return [
            'invoice' => ['fact1.xml', 'src/Standards/UBL2.1/UBL-Invoice-2.1.xsd'],
            'credit note' => ['creditnote1.xml', 'src/Standards/FACT1/UBL-CreditNote-2.1.xsd'],
            'fattura' => ['fatturapa7.xml', 'src/Standards/FatturaPA/Schema_del_file_xml_FatturaPA_v1.2.2.xsd'],
        ];
    }

    #[DataProvider('documents')]
    public function testFixturePassesXsd(string $file, string $schema): void
    {
        $this->checkSchema($file, $schema, false);
    }

    #[DataProvider('documents')]
    public function testMissingRequiredElementFailsXsd(string $file, string $schema): void
    {
        $this->checkSchema($file, $schema, true);
    }

    private function checkSchema(string $file, string $schema, bool $remove_required): void
    {
        $previous = libxml_use_internal_errors(true);
        libxml_clear_errors();
        try {
            $document = new \DOMDocument();
            $this->assertTrue($document->load('tests/Data/samples/' . $file));
            if ($remove_required) {
                $element_name = $file === 'fatturapa7.xml' ? 'FatturaElettronicaHeader' : 'ID';
                $element = $document->getElementsByTagName($element_name)->item(0);
                $this->assertInstanceOf(\DOMElement::class, $element);
                $element->parentNode->removeChild($element);
            }
            $valid = $document->schemaValidate($schema);
            $errors = libxml_get_errors();
            $messages = implode("\n", array_map(static fn ($error) => trim($error->message), $errors));
            $this->assertSame(!$remove_required, $valid, $messages);
            if ($remove_required) {
                $this->assertNotEmpty($errors);
                $this->assertStringContainsString($element_name, $messages);
            } else {
                $this->assertSame([], $errors, $messages);
            }
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
        }
    }
}
