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

class Scaffold
{
    private string $CustomizationID = 'urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0';

    private string $ProfileID = 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0';
    
    /**
     * standardPeppolDocument
     *
     * build a standard Peppol 3 document
     * 
     * @return void
     */
    public function standardPeppolDocument(){}
    
    /**
     * additions
     *
     * propertieres to be added in for country
     * 
     * @param  string $iso_3166_2
     * @return void
     */
    public function additions(string $iso_3166_2){}
    
    /**
     * omissions
     *
     * properties to be removed for country
     * 
     * @param  string $iso_3166_2
     * @return void
     */
    public function omissions(string $iso_3166_2){}
    
    /**
     * getSchemeId
     *
     * return the specific schemeID required for this country
     * 
     * @param  string $iso_3166_2
     * @return void
     */
    public function getSchemeId(string $iso_3166_2){}
}