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

namespace InvoiceNinja\EInvoice\Writer\Symfony;

class QuantityType
{
    public string $value;
    public string $unitCode;
    public string $unitCodeListID;
    public string $unitCodeListAgencyID;
    public string $unitCodeListAgencyName;
}
