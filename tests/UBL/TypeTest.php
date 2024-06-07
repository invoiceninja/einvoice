<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2024. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace InvoiceNinja\EInvoice\Tests\UBL;

use PHPUnit\Framework\TestCase;
use InvoiceNinja\EInvoice\Writer\Types\CacType;
use InvoiceNinja\EInvoice\Writer\Types\CbcType;
use InvoiceNinja\EInvoice\Writer\Types\CccType;
use InvoiceNinja\EInvoice\Writer\Types\ExtType;
use InvoiceNinja\EInvoice\Writer\Types\UdtType;

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

    }

    public function testCbcInitialization()
    {
        $cac = new CbcType();

        $this->assertIsArray($cac->elements);

        $this->assertGreaterThan(1, count($cac->elements));

    }

    public function testClassInitialization()
    {
        $udt = new UdtType();
        $this->assertInstanceOf(UdtType::class, $udt);

        $ext = new ExtType();
        $this->assertInstanceOf(ExtType::class, $ext);

        $cct = new CccType();
        $this->assertInstanceOf(CccType::class, $cct);
        
    }
}