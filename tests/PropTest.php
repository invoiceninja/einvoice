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

            echo $element->getAttribute('ref').PHP_EOL;
        }
    }
}
