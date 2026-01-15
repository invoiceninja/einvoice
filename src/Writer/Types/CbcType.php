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

namespace InvoiceNinja\EInvoice\Writer\Types;

use DOMElement;
use DOMNodeList;

class CbcType
{
    public string $path = "src/Standards/UBL2.1/common/UBL-CommonBasicComponents-2.1.xsd";

    private string $prefix = 'xsd';

    public array $type_map = [];

    public array $elements = [];

    private array $stub_validation =
        [
           "name" => null,
           "base_type" => null,
           "resource" => [],
           "max_length" => null,
           "min_length" => null,
           "pattern" => null,
   ];

    private \DOMDocument $document;

    public function __construct()
    {
        $this->document = new \DOMDocument();
        $this->document->load($this->path);
        $this->getTypes()->getElements();
    }

    /**
     * getElements
     *
     * @return self
     */
    public function getElements(): self
    {

        $this->elements = [];

        $data = [];

        foreach($this->type_map as $key => $value) {
            
            $e = [];
            
            $complexBaseType = $this->getUdtType($value);

            $name = substr($value, 0, -4);
            
            // if($complexBaseType == 'IdentifierType'){
            //     // $complexBaseType = $value;
            //         $e = [
            //             '#' => array_merge($this->stub_validation, ['name' => "value", 'base_type' => 'string','min_occurs' => 0, 'max_occurs' => 1, ]),
            //             'schemeID' => array_merge($this->stub_validation, ['name' => 'schemeID', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //             'schemeName' => array_merge($this->stub_validation, ['name' => 'schemeName', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //             'schemeAgencyID' => array_merge($this->stub_validation, ['name' => 'schemeAgencyID', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //             'schemeAgencyName' => array_merge($this->stub_validation, ['name' => 'schemeAgencyName', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //             'schemeVersionID' => array_merge($this->stub_validation, ['name' => 'schemeVersionID', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //             'schemeDataURI' => array_merge($this->stub_validation, ['name' => 'schemeDataURI', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //             'schemeURI' => array_merge($this->stub_validation, ['name' => 'schemeURI', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //             'listURI' => array_merge($this->stub_validation, ['name' => 'listURI', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //             'listSchemeURI' => array_merge($this->stub_validation, ['name' => 'listSchemeURI', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         ];

            // }
            // elseif($complexBaseType == 'CodeType'){
            //     // $complexBaseType = $value;
            //     $e = [
            //         '#' => array_merge($this->stub_validation, ['name' => "value", 'base_type' => 'string','min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'listID' => array_merge($this->stub_validation, ['name' => 'listID', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'listAgencyID' => array_merge($this->stub_validation, ['name' => 'listAgencyID', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'listAgencyName' => array_merge($this->stub_validation, ['name' => 'listAgencyName', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'listName' => array_merge($this->stub_validation, ['name' => 'listName', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'listVersionID' => array_merge($this->stub_validation, ['name' => 'listVersionID', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'name' => array_merge($this->stub_validation, ['name' => 'name', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'languageID' => array_merge($this->stub_validation, ['name' => 'languageID', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'listURI' => array_merge($this->stub_validation, ['name' => 'listURI', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'listSchemeURI' => array_merge($this->stub_validation, ['name' => 'listSchemeURI', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //     ];
  
            // }
            // elseif($complexBaseType == 'MeasureType'){
            //     // $complexBaseType = $value;
            //     $e = [
            //         '#' => array_merge($this->stub_validation, ['name' => "value", 'base_type' => 'string','min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'unitCode' => array_merge($this->stub_validation, ['name' => 'unitCode', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'unitCodeListVersionID' => array_merge($this->stub_validation, ['name' => 'unitCodeListVersionID', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         ];

            // }
            // elseif($complexBaseType == 'NumericType'){
            //     // $complexBaseType = 'NumericType';
            //     // $complexBaseType = $value;
            //     $e = [
            //         '#' => array_merge($this->stub_validation, ['name' => "value", 'base_type' => 'string','min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'format' => array_merge($this->stub_validation, ['name' => 'format', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         ];

            // }
            // elseif($complexBaseType == 'QuantityType'){
            //     // $complexBaseType = 'QuantityType';
            //     // $complexBaseType = $value;
            //     $e = [
            //         '#' => array_merge($this->stub_validation, ['name' => "value", 'base_type' => 'string','min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'unitCode' => array_merge($this->stub_validation, ['name' => 'unitCode', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'unitCodeListID' => array_merge($this->stub_validation, ['name' => 'unitCodeListID', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'unitCodeListAgencyID' => array_merge($this->stub_validation, ['name' => 'unitCodeListAgencyID', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         'unitCodeListAgencyName' => array_merge($this->stub_validation, ['name' => 'unitCodeListAgencyName', 'base_type' => 'string', 'min_occurs' => 0, 'max_occurs' => 1, ]),
            //         ];

            // }

            $data[] = array_merge($this->stub_validation, ['type' => $complexBaseType, 'base_type' => $complexBaseType, 'name' => $name, 'elements' => $e]);

        }

        $this->elements = $data;

        return $this;

    }

    /**
     * getUdtType
     *
     * @param  string $name
     * @return string
     */
    public function getUdtType(string $name): string
    {

        $xpath = "//xsd:complexType [@name='{$name}']//{$this->prefix}:simpleContent//{$this->prefix}:extension";

        $result = $this->getXPath($xpath);

        if($result->count() == 1) {

            /** @var DomElement */
            $element = $result->item(0);

            $base = $element->getAttribute('base');
            
            if(in_array($base, ['udt:IdentifierType','udt:CodeType', 'udt:MeasureType','udt:NumericType','udt:QuantityType'])){
                return str_replace("udt:","", $base);
            }

            return (new UdtType())->getPrimativeType(str_replace("udt:", "", $base));
        }

        throw new \Exception("could not get complex type {$name}");

    }


    private function getTypes()
    {

        $elements = $this->document->getElementsByTagName("element");

        foreach($elements as $element) {
            $this->type_map[$element->getAttribute("name")] = $element->getAttribute("type");
        }

        return $this;

    }
    /**
     * getPrimativeType
     *
     * @param  string $name
     * @return string
     */
    public function getPrimativeType(string $name): string
    {
        $name = $this->type_map[$name] ?? $name;

        $result = $this->getXPath("./{$this->prefix}:complexType [@name='{$name}']//{$this->prefix}:simpleContent//{$this->prefix}:extension");

        if($result->count() == 1) {

            
            /** @var \DomElement $element */
            $element = $result->item(0);

            $type = $element->getAttribute('base');

            if(stripos($type, "xsd") !== false) {
                return str_replace("{$this->prefix}:", "", $type);
            }

            //core component - contains nested children - which the API will handle, only need to display the prop.
            if(stripos($type, "ccts-cct") !== false) {
                $parts = explode(":", $type);
                return (new CccType())->getPrimativeType($parts[1]);
            }

            if(stripos($type, "udt") !== false) {
                $parts = explode(":", $type);

                // if($parts[1] == 'IdentifierType'){
                //     return $name;
                // }

            if(in_array($parts[1], ['IdentifierType','CodeType', 'MeasureType','NumericType','QuantityType']))
                return $parts[1];

                return (new UdtType())->getPrimativeType($parts[1]);
            }

        }

        throw new \Exception("Could not find type {$name}");
    }

    public function typesForType(string $type)
    {
        foreach($this->elements as $e){

            if($e['type'] == $type)
                return collect([$type]);

        }

        return collect([]);
    }

    /**
     * getXPath
     *
     * @param  string $path
     * @param  \DomElement $element
     * @return \DOMNodeList
     */
    private function getXPath(string $path, ?\DomElement $element = null): \DOMNodeList
    {
        $xpath = new \DOMXPath($this->document);
        return $xpath->query($path, $element);
    }

    /**
     * getNamedType
     *
     * @param  string $name
     * @return array
     */
    public function getNamedType(string $name): array
    {
        $base_type = $this->getPrimativeType($name);

        return [
            'base_type' => $base_type,
        ];
    }
}
