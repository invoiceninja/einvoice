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

namespace InvoiceNinja\EInvoice\Standards\Peppol;

class Period
{

    public array $codes = [
        "3" => "Invoice document issue date time", //[2377] Date of issue of an invoice.
        "35" =>	"Delivery date/time, actual", //Date/time on which goods or consignment are delivered at their destination.
        "432" => "Paid to date", //Date to which payments have been paid.
    ];

}