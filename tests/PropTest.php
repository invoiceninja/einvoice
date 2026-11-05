<?php

namespace InvoiceNinja\EInvoice\Tests;

use DOMDocument;
use PHPUnit\Framework\TestCase;

class PropTest extends TestCase
{
    public function setUp(): void
    {

    }

    public function testFactProps()
    {
        $dom = new DOMDocument();
        $dom->load("src/Standards/FACT1/UBL-Invoice-2.1.xsd");


        $xpath = new \DOMXPath($dom);
        $xpath->registerNamespace('xs', 'http://www.w3.org/2001/XMLSchema');
        $this->assertSame(1, $xpath->query('//xs:element[@ref="cbc:ID"]')->length);
        $this->assertSame(1, $xpath->query('//xs:element[@ref="cac:InvoiceLine"]')->length);
    }

    public function testFatturaProps()
    {
        $dom = new DOMDocument();
        $dom->load("src/Standards/FatturaPA/Schema_del_file_xml_FatturaPA_v1.2.2.xsd");


        // $complexTypes = $dom->getElementsByTagName('element');
        $complexTypes = $dom->getElementsByTagName('complexType');
        
        $x = [];

        foreach($complexTypes as $type) {

            if($type->hasAttribute('name')){

                $x[] = $type->getAttribute('name');
            }
        }

        $a = [];
        foreach($x as $y)
        {     
            
            $xpath = new \DOMXPath($dom);
            $result = $xpath->query('./xs:complexType [@name="'.$y.'"]//xs:sequence');

            $node = $result->item(0);

            // $a[$y]
            foreach($node->childNodes as $childNode) {
            
                if($childNode instanceof \DomElement) {
                    // echo $childNode->getAttribute('name').PHP_EOL;
                    $a[$y][] = $childNode->getAttribute('name');
                }
            }

        }
            
        $this->assertIsArray($a);            
        // echo json_encode($a,JSON_PRETTY_PRINT).PHP_EOL;

    }
}



