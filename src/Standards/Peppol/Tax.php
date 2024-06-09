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

class Tax
{

    public array $taxes = [
        'AA'=>	'Lower rate', // Tax rate is lower than standard rate.
        'O' =>	'Services outside scope of tax', // Code specifying that taxes are not applicable to the services.
        'S' =>	'Standard rate', // Code specifying the standard rate.
        'Z' =>	'Zero rated goods', //Code specifying that the goods are at a zero rate.
    ];

}