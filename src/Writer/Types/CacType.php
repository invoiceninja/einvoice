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

class CacType
{
    public string $path = "src/Standards/UBL2.1/common/UBL-CommonAggregateComponents-2.1.xsd";

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

    private CbcType $cbcType;
    private UdtType $udtType;
    private CccType $cccType;

    private \DOMDocument $document;

    public function __construct()
    {
        $this->document = new \DOMDocument();
        $this->document->load($this->path);

        $this->cbcType = new CbcType();
        $this->udtType = new UdtType();
        $this->cccType = new CccType();

        $this->getTypes()->getElements();

    }
    
    /**
     * getTypes
     *
     * Generates an array of name / value pairs
     * 
     * @return self
     */
    public function getTypes(): self
    {

        $this->document->load($this->path);

        $elements = $this->document->getElementsByTagName("element");

        foreach($elements as $element) {

            if($element->hasAttribute('name')) {
                $this->type_map[$element->getAttribute("name")] = $element->getAttribute("type");
            }
        }

        return $this;
    }

    public function getElements(): self
    {

        $this->elements = [];

        foreach($this->type_map as $key => $value) {

            $sequence = $this->getSequence($key);

            $base_type = $value;

            $elements = [];

            for($x = 0; $x < $sequence->count(); $x++) {

                if($sequence->item($x) instanceof DOMElement) {

                    $elements[] = $this->parseSequenceNode($sequence->item($x));
                }
            }

            $data[] = ['type' => $base_type, 'help' => '', 'choices' => [], 'elements' => $elements[0]];
        }

        $this->elements = $data;

        return $this;

    }

    public function typesForType(string $type)
    {
        //get the child types of a type

        $children = collect([]);

        $xpath = "//xsd:complexType [@name='{$type}']//{$this->prefix}:sequence";

        $sequence = $this->getXPath($xpath);

        for($x = 0; $x < $sequence->count(); $x++) {

            foreach($sequence->item($x)->childNodes as $node) {

                if($node instanceof DOMElement && $node->hasAttribute("ref") && stripos($node->getAttribute('ref'), 'cac:') !== false) {

                    $parts = explode(":", $node->getAttribute('ref'));
                    $children->push($this->type_map[$parts[1]]);
                }
            }

        }
        // echo $type.PHP_EOL;
        // echo $children->unique()->implode("\n").PHP_EOL;

        return $children->unique();

    }

    public function typeChildren()
    {
        $children = collect([]);

        foreach($this->type_map as $key => $type)
        {
            $sequence = $this->getSequence($key);

            for($x = 0; $x < $sequence->count(); $x++) 
            {

                foreach($sequence->item($x)->childNodes as $node) 
                {
                    
                    if($node instanceof DOMElement && $node->hasAttribute("ref") && stripos($node->getAttribute('ref'), 'cac:') !== false) 
                    {
                    
                        $parts = explode(":", $node->getAttribute('ref'));
                    
                        $children->push($this->type_map[$parts[1]]);
                    }    
                }   
                
            }

        }

        return $children->unique();
    }

    public function getSequence(string $name): ?DOMNodeList
    {

        $base_type = $this->type_map[$name];

        $xpath = "//xsd:complexType [@name='{$base_type}']//{$this->prefix}:sequence";

        return $this->getXPath($xpath);

    }

    private function parseSequenceNode(DOMElement $element): array
    {

        $data = [];

        foreach($element->childNodes as $childNode) {

            $child_array = [];

            if($childNode instanceof DOMElement) {

                foreach($childNode->attributes as $key => $attr) {

                    if(in_array($attr->nodeName, ['ref', 'minOccurs','maxOccurs'])) {

                        $key = $attr->nodeName == 'ref' ? 'name' : $attr->nodeName;

                        if($attr->nodeName == 'maxOccurs') {
                            $child_array['max_occurs'] = $attr->nodeValue == 'unbounded' ? -1 : (int)$attr->nodeValue;
                        } elseif($attr->nodeName == 'minOccurs') {
                            $child_array['min_occurs'] = (int)$attr->nodeValue;
                        } else {
                            $child_array[$key] = $attr->nodeValue;
                        }

                        $child_array['help'] = $this->getAnnotation($childNode);
                    }
                }

                $data[] = array_merge($this->stub_validation, $this->parseNodeTypes($child_array));

            }
        }

        return $data;

    }


    private function parseNodeTypes(array $data): array
    {
        $searchable_type = $data['name'];

        $parts = explode(":", $data['name']);

        $parsed_name = count($parts) > 1 ? $parts[1] : $data['name'];

        //not a standard type, harvest a child data type of this object class
        if(isset($this->type_map[$data['name']])) {
            $node_name = $this->type_map[$data['name']];
            $result = $this->getXPath("./{$this->prefix}:complexType [@name='{$node_name}']//{$this->prefix}:simpleContent//{$this->prefix}:extension");

            if($result->count() == 1) {
                $searchable_type = $result->item(0)->getAttribute('base');
            }
        }

        //perhaps already a type ie ":"
        if(stripos($searchable_type, ":") !== false) {
            $data['name'] = $parsed_name;
            $data['base_type'] = $this->extractRelatedType($searchable_type);
            ksort($data);
            return $data;
        }

        if(isset($this->type_map[$searchable_type])) {
            $data['name'] = $parsed_name;
            $data['base_type'] = $this->type_map[$searchable_type];

            ksort($data);
            return $data;
        }

        throw new \Exception("Could not find type for => ". $searchable_type);

    }
    
    /**
     * extractRelatedType
     *
     * @param  string $related_type
     * @return string
     */
    private function extractRelatedType(string $related_type): string
    {
        $parts = explode(":", $related_type);

        match($parts[0]) {
            'cbc' => $type = $this->cbcType->getPrimativeType($parts[1]),
            'cac' => $type = $this->type_map[$parts[1]],
            'udt' => $type = $this->udtType->getPrimativeType($parts[1]),
            'ccts-cct' => $type = $this->cccType->getPrimativeType($parts[1]),
        };

        return $type ?? throw new \Exception("could not find related type {$related_type}");
    }

    
    /**
     * getAnnotation
     *
     * @param  mixed $element
     * @return string
     */
    private function getAnnotation(DOMElement $element): string
    {
        $result = $this->getXPath("./{$this->prefix}:annotation//{$this->prefix}:documentation//ccts:Component//ccts:Definition", $element);

        return $result->count() > 0 ? trim(str_replace("\n", "", $result->item(0)->nodeValue)) : '';

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
        return $this->parseNodeTypes(['name' => $name]);
    }
}
