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

class UdtType
{
    public string $path = "src/Standards/UBL2.1/common/UBL-UnqualifiedDataTypes-2.1.xsd";

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
    }

    /**
     * getPrimativeType
     *
     * @param  string $name
     * @return string
     */
    public function getPrimativeType(string $name): string
    {
        $result = $this->getXPath("./{$this->prefix}:complexType [@name='{$name}']//{$this->prefix}:simpleContent//{$this->prefix}:extension");

        if($result->count() == 0) {
            $result = $this->getXPath("./{$this->prefix}:complexType [@name='{$name}']//{$this->prefix}:simpleContent//{$this->prefix}:restriction");
        }

        if($result->count() == 1) {

            /** @var \DOMElement $element */
            $element = $result->item(0);

            $type = $element->getAttribute(('base'));


            if(stripos($type, "ccts") !== false) {
                $parts = explode(":", $type);

                // if(in_array($parts[1], ['QuantityType','AmountType','MeasureType', 'QuantityType', 'NumericType', 'CodeType', 'IdentifierType'])) {
                if(in_array($parts[1], ['QuantityType','AmountType', 'CodeType' ,'MeasureType', 'QuantityType',  'IdentifierType', ])) {
                    return $parts[1];
                }

                return (new CccType())->getPrimativeType($parts[1]);
            }

            return str_replace("{$this->prefix}:", "", $type);
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
        return ['base_type' => $this->getPrimativeType($name)];
    }
}
