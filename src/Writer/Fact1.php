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

namespace InvoiceNinja\EInvoice\Writer;

use DOMElement;
use InvoiceNinja\EInvoice\Writer\Rules\Fact1Rules;
use InvoiceNinja\EInvoice\Writer\Types\CacType;
use InvoiceNinja\EInvoice\Writer\Types\CbcType;
use InvoiceNinja\EInvoice\Writer\Types\ExtType;

class Fact1 extends BaseStandard
{
    public string $prefix = "xsd";

    private ExtType $extType;
    private CacType $cacType;
    private CbcType $cbcType;

    private array $visibility = [
        'UBLExtensions' => 0,
        'UBLVersionID' => 0,
        'CustomizationID' => 0,
        'ProfileID' => 0,
        'ProfileExecutionID' => 0,
        'ID' => 4,
        'CopyIndicator' => 0,
        'UUID' => 0,
        'IssueDate' => 4,
        'IssueTime' => 4,
        'DueDate' => 4,
        'InvoiceTypeCode' => 4,
        'Note' => 4,
        'TaxPointDate' => 4,
        'DocumentCurrencyCode' => 7,
        'TaxCurrencyCode' => 7,
        'PricingCurrencyCode' => 7,
        'PaymentCurrencyCode' => 7,
        'PaymentAlternativeCurrencyCode' => 7,
        'AccountingCostCode' => 2,
        'AccountingCost' => 2,
        'LineCountNumeric' => 0,
        'BuyerReference' => 2,
        'InvoicePeriod' => 4,
        'OrderReference' => 4,
        'BillingReference' => 4,
        'DespatchDocumentReference' => 4,
        'ReceiptDocumentReference' => 4,
        'StatementDocumentReference' => 4,
        'OriginatorDocumentReference' => 4,
        'ContractDocumentReference' => 4,
        'AdditionalDocumentReference' => 4,
        'ProjectReference' => 4,
        'Signature' => 0,
        'AccountingSupplierParty' => 1,
        'AccountingCustomerParty' => 2,
        'PayeeParty' => 1,
        'BuyerCustomerParty' => 2,
        'SellerSupplierParty' => 1,
        'TaxRepresentativeParty' => 1,
        'Delivery' => 1,
        'DeliveryTerms' => 7,
        'PaymentMeans' => 7,
        'PaymentTerms' => 7,
        'PrepaidPayment' => 4,
        'AllowanceCharge' => 4,
        'TaxExchangeRate' => 0,
        'PricingExchangeRate' => 0,
        'PaymentExchangeRate' => 0,
        'PaymentAlternativeExchangeRate' => 0,
        'TaxTotal' => 0,
        'WithholdingTaxTotal' => 0,
        'LegalMonetaryTotal' => 0,
        'InvoiceLine' => 0,
    ];

    private array $type_tracker = [];

    public string $path = "src/Standards/FACT1/UBL-Invoice-2.1.xsd";

    public string $standard = "FACT1";

    public array $classMap = [

    ];

    /** @var array $exclusion_nodes - array of nodes to exclude from the output*/
    private array $exclusion_nodes = [
        'ext:UBLExtensions',
    ];

    public function __construct()
    {

    }

    public function init(): self
    {

        $this->cbcType = new CbcType();
        $this->extType = new ExtType();
        $this->cacType = new CacType();

        $this->document = new \DomDocument();
        $this->document->load($this->path);

        $this->parentProps()
        ->childNodes()
        ->childTypes()
        ->updateRules()
        ->write();

        return $this;

    }

    public function parentProps(): self
    {

        $elements = $this->document->getElementsByTagName('element');

        $parent_elements = [];

        foreach($elements as $element) {

            if(!$element->hasAttribute('ref') || in_array($element->getAttribute('ref'), $this->exclusion_nodes)) {
                continue;
            }

            $parts = explode(":", $element->getAttribute('ref'));

            $maxOccurs = $element->getAttribute('maxOccurs');

            if($maxOccurs == "unbounded") {
                $maxOccurs = "-1";
            }

            $parent_elements[$parts[1]] = array_merge($this->stub_validation, [
                'name' => $parts[1],
                'base_type' => $element->getAttribute('ref'),
                'min_occurs' => (int)$element->getAttribute('minOccurs'),
                'max_occurs' => (int)$maxOccurs,
                'help' => $this->getAnnotation($element),
                'namespace' => $parts[0],
            ]);

        }

        $this->data['InvoiceType'] = [
            'type' => 'InvoiceType',
            'help' => '',
            'choices' => [],
            'elements' => $parent_elements
        ];

        return $this;
    }

    private function getAnnotation(DOMElement $element): string
    {
        $result = $this->getXPath("./{$this->prefix}:annotation//{$this->prefix}:documentation//ccts:Component//ccts:Definition", $element);

        return $result->count() > 0 ? trim(str_replace("\n", "", $result->item(0)->nodeValue)) : '';

    }

    private function getXPath(string $path, \DomElement $element = null): ?\DOMNodeList
    {
        $xpath = new \DOMXPath($this->document);
        return $xpath->query($path, $element);
    }

    private function childNodes(): self
    {
        foreach($this->data as $key => $elements) {

            foreach($elements['elements'] as $eKey => $element) {
                $this->data[$key]['elements'][$eKey] = array_merge($element, $this->harvestNode($element['base_type']));
            }
        }

        return $this;
    }

    /** Nested type props need to be harvested and resolved */
    private function childTypes(): self
    {
        $this->type_tracker[] = 'AmountType';
        $this->type_tracker[] = 'QuantityType';
        $element_collection = collect($this->cacType->elements);

        $type_map = collect($this->data)
        ->map(function ($type) {

            return collect($type['elements'])
            ->filter(function ($element) {
                return stripos($element['base_type'], 'Type') !== false && !in_array($element['base_type'], $this->type_tracker);
            })
            ->map(function ($element) {
                $this->type_tracker[] = $element['base_type'];
                return $element['base_type'];
            })
            ->flatten();

        })->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique();

        collect($this->type_tracker)
        ->unique()
        ->each(function ($type) use ($element_collection) {

            $type_array = $element_collection->where('type', $type)->first();

            $new_set = [];
            foreach($type_array['elements'] as $stub) {
                $new_set[$stub['name']] = $stub;
            }
            $type_array['elements'] = $new_set;

            $this->data[$type_array['type']] = (object)$type_array;


        });

        return $this;
    }


    private function harvestNode(string $name)
    {

        $parts = explode(":", $name);

        match($parts[0]) {
            'cac' => $type = $this->cacType,
            'cbc' => $type = $this->cbcType,
            'ext' => $type = $this->extType,
            default => $type = $this->cbcType,
        };

        return $type->getNamedType($parts[1]);

    }

    private function updateRules(): self
    {

        $e = new Fact1Rules();
        $rules = $e->buildInvoice();

        foreach($rules["invoice"] as $key => $value) {

            foreach($this->data["InvoiceType"]['elements'] as $eKey => $eValue) {

                if(isset($eValue['name']) && $eValue['name'] == $key) {

                    $this->data["InvoiceType"]['elements'][$eKey] = array_merge($eValue, $value);

                }
            }

        }

        foreach($rules['nested'] as $key => $value) {

            foreach($this->data as $dKey => $dValue) {
                if(isset($dValue->type) && $key == $dValue->type) {
                    foreach($rules['nested'][$key] as $nestKey => $value) {
                        foreach($dValue->elements as $ddKey => $ddValue) {
                            if(is_array($ddValue) && $ddValue['name'] == $nestKey) {

                                $this->data[$dKey]->elements[$ddKey] = (object)array_merge((array)$this->data[$dKey]->elements[$ddKey], $value);
                            } elseif(is_object($ddValue) && $ddValue->name == $nestKey) {

                                $this->data[$dKey]->elements[$ddKey] = (object)array_merge((array)$this->data[$dKey]->elements[$ddKey], $value);

                            }

                        }
                    }
                }

            }

        }

        return $this;
    }

}
