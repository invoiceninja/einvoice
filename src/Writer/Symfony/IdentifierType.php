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

class IdentifierType
{
    public string $value;
    public string $schemeID;
    public string $schemeName;
    public string $schemeAgencyID;
    public string $schemeAgencyName;
    public string $schemeVersionID;
    public string $schemeDataURI;
    public string $schemeURI;
    public string $listURI;
    public string $listSchemeURI;
}
