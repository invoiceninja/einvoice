<?php

namespace Invoiceninja\Einvoice\Tests\UBL;

use Invoiceninja\Einvoice\Writer\Types\CacType;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{

    public function setUp(): void
    {

    }

    public function testCacInitialization()
    {
        $cac = new CacType();

        $this->assertIsArray($cac->elements);

        $this->assertGreaterThan(1, count($cac->elements));

        // echo print_r($cac->elements).PHP_EOL;
    }
}