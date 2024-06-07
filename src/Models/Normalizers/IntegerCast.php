<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/einvoice source repository
 *
 * @copyright Copyright (c) 2024. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace InvoiceNinja\EInvoice\Models\Normalizers;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class IntegerCast
{
    public function __construct(private mixed $int)
    {
    }
}
