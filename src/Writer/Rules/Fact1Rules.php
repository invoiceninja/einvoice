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

namespace Invoiceninja\Einvoice\Writer\Rules;

class Fact1Rules
{
    public array $stub_validation = [
        "name" => null,
        "base_type" => null,
        "resource" => [],
        "max_length" => null,
        "min_length" => null,
        "pattern" => null,
    ];

    private $build_array = [];

    private array $payment_means_codes = [
        '1' => 'Instrument not defined',
        '2' => 'Automated clearing house credit',
        '3' => 'Automated clearing house debit',
        '4' => 'ACH demand debit reversal',
        '5' => 'ACH demand credit reversal',
        '6' => 'ACH demand credit',
        '7' => 'ACH demand debit',
        '8' => 'Hold',
        '9' => 'National or regional clearing',
        '10' => 'In cash',
        '11' => 'ACH savings credit reversal',
        '12' => 'ACH savings debit reversal',
        '13' => 'ACH savings credit',
        '14' => 'ACH savings debit',
        '15' => 'Bookentry credit',
        '16' => 'Bookentry debit',
        '17' => 'ACH demand cash concentration/disbursement (CCD) credit',
        '18' => 'ACH demand cash concentration/disbursement (CCD) debit',
        '19' => 'ACH demand corporate trade payment (CTP) credit',
        '20' => 'Cheque',
        '21' => 'Banker\'s draft',
        '22' => 'Certified banker\'s draft',
        '23' => 'Bank cheque (issued by a banking or similar establishment)',
        '24' => 'Bill of exchange awaiting acceptance',
        '25' => 'Certified cheque',
        '26' => 'Local cheque',
        '27' => 'ACH demand corporate trade payment (CTP) debit',
        '28' => 'ACH demand corporate trade exchange (CTX) credit',
        '29' => 'ACH demand corporate trade exchange (CTX) debit',
        '30' => 'Credit transfer',
        '31' => 'Debit transfer',
        '32' => 'ACH demand cash concentration/disbursement plus (CCD+) credit',
        '33' => 'ACH demand cash concentration/disbursement plus (CCD+) debit',
        '34' => 'ACH prearranged payment and deposit (PPD)',
        '35' => 'ACH savings cash concentration/disbursement (CCD) credit',
        '36' => 'ACH savings cash concentration/disbursement (CCD) debit',
        '37' => 'ACH savings corporate trade payment (CTP) credit',
        '38' => 'ACH savings corporate trade payment (CTP) debit',
        '39' => 'ACH savings corporate trade exchange (CTX) credit',
        '40' => 'ACH savings corporate trade exchange (CTX) debit',
        '41' => 'ACH savings cash concentration/disbursement plus (CCD+) credit',
        '42' => 'Payment to bank account',
        '43' => 'ACH savings cash concentration/disbursement plus (CCD+) debit',
        '44' => 'Accepted bill of exchange',
        '45' => 'Referenced home-banking credit transfer',
        '46' => 'Interbank debit transfer',
        '47' => 'Home-banking debit transfer',
        '48' => 'Bank card',
        '49' => 'Direct debit',
        '50' => 'Payment by postgiro',
        '51' => 'FR, norme 6 97-Telereglement CFONB (French Organisation for Banking Standards)  - Option A',
        '52' => 'Urgent commercial payment',
        '53' => 'Urgent Treasury Payment',
        '60' => 'Promissory note',
        '61' => 'Promissory note signed by the debtor',
        '62' => 'Promissory note signed by the debtor and endorsed by a bank',
        '63' => 'Promissory note signed by the debtor and endorsed by a third party',
        '64' => 'Promissory note signed by a bank',
        '65' => 'Promissory note signed by a bank and endorsed by another bank',
        '66' => 'Promissory note signed by a third party',
        '67' => 'Promissory note signed by a third party and endorsed by a bank',
        '70' => 'Bill drawn by the creditor on the debtor',
        '74' => 'Bill drawn by the creditor on a bank',
        '75' => 'Bill drawn by the creditor, endorsed by another bank',
        '76' => 'Bill drawn by the creditor on a bank and endorsed by a third party',
        '77' => 'Bill drawn by the creditor on a third party',
        '78' => 'Bill drawn by creditor on third party, accepted and endorsed by bank',
        '91' => 'Not transferable banker\'s draft',
        '92' => 'Not transferable local cheque',
        '93' => 'Reference giro',
        '94' => 'Urgent giro',
        '95' => 'Free format giro',
        '96' => 'Requested method for payment was not used',
        '97' => 'Clearing between partners',
        'ZZZ' => 'Mutually defined',
    ];

    public function __construct()
    {

    }

    public function getBuildArray(): array
    {
        return $this->build_array;
    }

    public function setBuildArray(array $array): self
    {
        $this->build_array = array_merge($this->build_array, $array);

        return $this;
    }

    public function buildInvoice(): array
    {
        $this->build_array = [];

        $invoice =

        $this->setBuildArray($this->invoiceRules())
             ->setBuildArray($this->genericEntityRules())
             ->getBuildArray();

        return ['invoice' => $invoice, "nested" => $this->complexRules()];
    }

    public function ruleSet(): array
    {
        $rules = [
            [
                'name' => 'InvoiceTypeCode',
                'base_type' => 'string',
                'resource' => [
                    '380' => '380',
                    '384' => '384',
                    '389' => '389', 
                    '751' => '751'],
            ],
            [
                'name' => 'StreetName',
                'base_type' => 'string',
                'min_length' => 1,
            ],
            [
                'name' => 'CityName',
                'base_type' => 'string',
                'min_length' => 1,
            ],
            [
                'name' => 'DescriptionCode',
                'base_type' => 'string',
                'resource' => ['3' => '3', '35' => '35', '432' => '432'],
            ],
            [
                'name' => 'CreditTypeCode',
                'base_type' => 'string',
                'resource' => ['381' => '381'],
            ],
            [
                'name' => 'Note',
                'base_type' => 'string',
                'max_length' => 300,
            ],
        ];

        foreach($rules as $key => $rule) {
            $rules[$key] = array_merge($this->stub_validation, $rule);
        }

        return $rules;
    }

    public function complexRules()
    {
        return [
            'PeriodType' => [
                'DescriptionCode' => [
                    'resource' => [
                        '3' => "Invoice Date",
                        '35' => "Delivery Date",
                        '432' => "Payment Date",
                    ],
                ],
            ],
            'AddressType' => [
                'AdditionalStreetName' => [
                    'max_length' => 150,
                    'max_length' => 100,
                ],
                'StreetName' => [
                    'max_length' => 150,
                    'min_length' => 1,
                    'min_occurs' => 1,
                ],
                'CityName' => [
                    'min_length' => 1,
                    'max_length' => 50,
                    'min_occurs' => 1,
                ],
                'PostalZone' => [
                    'max_length' => 20,
                ],
                'CountrySubentity' => [
                    'base_type' => 'string',
                    'min_length' => 1,
                    'min_occurs' => 1,
                    'resource' => [
                        'RO-AB' => 'RO-AB',
                        'RO-AG' => 'RO-AG',
                        'RO-AR' => 'RO-AR',
                        'RO-B' => 'RO-B',
                        'RO-BC' => 'RO-BC',
                        'RO-BH' => 'RO-BH',
                        'RO-BN' => 'RO-BN',
                        'RO-BR' => 'RO-BR',
                        'RO-BT' => 'RO-BT',
                        'RO-BV' => 'RO-BV',
                        'RO-BZ' => 'RO-BZ',
                        'RO-CJ' => 'RO-CJ',
                        'RO-CL' => 'RO-CL',
                        'RO-CS' => 'RO-CS',
                        'RO-CT' => 'RO-CT', 
                        'RO-CV' => 'RO-CV', 
                        'RO-DB' => 'RO-DB', 
                        'RO-DJ' => 'RO-DJ', 
                        'RO-GJ' => 'RO-GJ', 
                        'RO-GL' => 'RO-GL', 
                        'RO-GR' => 'RO-GR', 
                        'RO-HD' => 'RO-HD', 
                        'RO-HR' => 'RO-HR', 
                        'RO-IF' => 'RO-IF', 
                        'RO-IL' => 'RO-IL', 
                        'RO-IS' => 'RO-IS', 
                        'RO-MH' => 'RO-MH', 
                        'RO-MM' => 'RO-MM', 
                        'RO-MS' => 'RO-MS', 
                        'RO-NT' => 'RO-NT', 
                        'RO-OT' => 'RO-OT', 
                        'RO-PH' => 'RO-PH', 
                        'RO-SB' => 'RO-SB', 
                        'RO-SJ' => 'RO-SJ', 
                        'RO-SM' => 'RO-SM', 
                        'RO-SV' => 'RO-SV', 
                        'RO-TL' => 'RO-TL', 
                        'RO-TM' => 'RO-TM', 
                        'RO-TR' => 'RO-TR', 
                        'RO-VL' => 'RO-VL', 
                        'RO-VN' => 'RO-VN', 
                        'RO-VS' => 'RO-VS',
                    ],
                ],
            ],
            'DocumentReferenceType' => [
                'ID' => [
                    'min_occurs' => 1,
                    'min_length' => 1,
                    'max_length' => 200,
                ],
                'DocumentDescription' => [
                    'max_length' => 100,
                ],
            ],
            'OrderReferenceType' => [
                'ID' => [
                    'max_length' => 200,
                ],
                'SalesOrderID' => [
                    'max_length' => 200,
                ],
            ],
            'InvoiceLineType' => [
                'AccountingCost' => [
                    'max_length' => 100,
                ],
                'Note' => [
                    'max_length' => 300,
                ],
                'LineExtensionAmount' => [
                    'fraction_digits' => 2,
                ]
            ],
            'AddressLineType' => [
                'Line' => [
                    'max_length' => 100,
                ]
            ],
            'ContactType' => [
                'Name' => [
                    'max_length' => 100,
                ],
                'Telephone' => [
                    'max_length' => 100,
                ],
                'ElectronicMail' => [
                    'max_length' => 100,
                ],
            ],
            'TaxCategoryType' => [
                'TaxExemptionReason' => [
                    'max_length' => 100,
                ]
            ],
            'PartyLegalEntityType' => [
                'RegistrationName' => [
                    'max_length' => 200,
                ],
                'CompanyLegalForm' => [
                    'max_length' => 1000,
                ]
            ],
            'PartyNameType' => [
                'Name' => [
                    'max_length' => 200,
                ],
            ],
            'PaymentTermsType' => [
                'Note' => [
                    'max_length' => 300,
                ],
            ],
            'FinancialAccountType' => [
                'Name' => [
                    'max_length' => 200,
                ],
            ],
            'CardAccountType' => [
                'HolderName' => [
                    'max_length' => 200,
                ],
            ],
            'PaymentMeansType' => [
                'PaymentID' => [
                    'max_length' => 140,
                ]
            ],
            'ItemType' => [
                'Name' => [
                    'max_length' => 100,
                ],
                'Description' => [
                    'max_length' => 200,
                ],
                'AdditionalItemProperty' => [
                    'max_occurs' => 50,
                ],
            ],
            'ItemPropertyType' => [
                'Name' => [
                    'max_length' => 50,
                ],
                'Value' => [
                    'max_length' => 100,
                ]
            ],
            'AllowanceChargeType' => [
                'AllowanceChargeReasonCode' => [
                    'max_length' => 100,
                ],
                'Amount' => [
                    'fraction_digits' => 2
                ],
                'BaseAmount' => [
                    'fraction_digits' => 2
                ],
                'AllowanceChargeReason' => [
                    'max_length' => 100
                ]
            ],
            'MonetaryTotalType' => [
                'LineExtensionAmount' => [
                    'fraction_digits' => 2,
                ],
                'AllowanceTotalAmount' => [
                    'fraction_digits' => 2,
                ],
                'ChargeTotalAmount' => [
                    'fraction_digits' => 2,
                ],
                'TaxExclusiveAmount' => [
                    'fraction_digits' => 2,
                ],
                'TaxInclusiveAmount' => [
                    'fraction_digits' => 2,
                ],
                'PrepaidAmount' => [
                    'fraction_digits' => 2,
                ],
                'PayableRoundingAmount' => [
                    'fraction_digits' => 2,
                ],
                'PayableAmount' => [
                    'fraction_digits' => 2,
                ],
            ],
            'TaxSubtotalType' => [
                'TaxableAmount' => [
                    'fraction_digits' => 2,
                ],
                'TaxAmount' => [
                    'fraction_digits' => 2,
                ],
            ],
            'PaymentMeansType' => [
                'PaymentMeansCode' => [
                    'resource' => $this->payment_means_codes
                ]
            ]
        ];
    }

    public function invoiceRules()
    {
        return [
            'InvoiceTypeCode' => [
                'base_type' => 'int',
                'resource' => [
                    '380' => '380',
                    '384' => '384',
                    '389' => '389',
                    '751' => '751',
                ],
            ],
        ];
    }

    public function creditRules()
    {
        return [
            'CreditTypeCode' => [
                'base_type' => 'int',
                'resource' => [
                    '381' => '381'
                ],
            ],
        ];
    }

    public function genericEntityRules()
    {
        return [
            'ID' => [
                'base_type' => 'string',
                'pattern' => '([0-9])',
            ],
            'Note' => [
                'base_type' => 'string',
                'min_length' => 0,
                'max_length' => 300,
            ],
            'InvoiceDocumentReference' => [
                'base_type' => 'string',
                'min_length' => 1,
                'max_length' => 200,
                'min_occurs' => 1,
            ],
        ];
    }

}
