<?php

namespace Invoiceninja\Einvoice\Tests;

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


        $elements = $dom->getElementsByTagName('element');

        foreach($elements as $element) {

            if(!$element->hasAttribute('ref')) {
                continue;
            }

            // echo $element->getAttribute('ref').PHP_EOL;
        }
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
                echo $type->getAttribute('name').PHP_EOL;
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
            
            
        echo print_r($a,1).PHP_EOL;

    }
}



