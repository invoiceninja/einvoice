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

namespace Invoiceninja\Einvoice\Writer\Types;

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

        foreach($this->type_map as $key => $value) {

// $time_start = microtime(true);
// echo "{$key} => ". microtime(true)  - $time_start.PHP_EOL;

            $complexBaseType = $this->getUdtType($value);

            $data[] = array_merge($this->stub_validation, ['base_type' => $complexBaseType]);
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
            return (new UdtType())->getPrimativeType(str_replace("udt:", "", $result->item(0)->getAttribute('base')));
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
            $type = $result->item(0)->getAttribute('base');

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
                return (new UdtType())->getPrimativeType($parts[1]);
            }


        }

        throw new \Exception("Could not find type {$name}");
    }

    
    /**
     * getXPath
     *
     * @param  string $path
     * @param  mixed $element
     * @return DOMNodeList
     */
    private function getXPath(string $path, \DomElement $element = null): ?\DOMNodeList
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
