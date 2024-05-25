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

class ExtType
{
    private string $path = 'src/Standards/UBL2.1/common/UBL-CommonExtensionComponents-2.1.xsd';

    private string $prefix = 'xsd';

    public array $type_map;

    public array $elements;
    
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
     * getTypes
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
    
    /**
     * getSequence
     *
     * @param  string $name
     * @return DOMNodeList
     */
    public function getSequence(string $name): ?\DOMNodeList
    {

        $base_type = $this->type_map[$name];

        $xpath = "//xsd:complexType [@name='{$base_type}']//{$this->prefix}:sequence";

        return $this->getXPath($xpath);

    }
    
    /**
     * getAnnotation
     *
     * @param  mixed $element
     * @return string
     */
    private function getAnnotation(DOMElement $element): string
    {

        $result = $this->getXPath("./{$this->prefix}:annotation//{$this->prefix}:documentation", $element);

        return $result->count() > 0 ? trim(str_replace("\n", "", $result->item(0)->nodeValue)) : '';

    }
        
    /**
     * getElements
     *
     * @return self
     */
    public function getElements(): self
    {
        $this->elements;

        foreach($this->type_map as $key => $value) {
            $sequence = $this->getSequence($key);
            $base_type = $value;

            $elements;

            for($x = 0; $x < $sequence->count(); $x++) {
                if($sequence->item($x) instanceof DOMElement) {

                    $elements[] = $this->parseSequenceNode($sequence->item($x));
                }
            }

            if(count($elements) > 0) {
                $data[] = ['type' => $base_type, 'elements' => $elements[0]];
            }
        }

        $this->elements = $data;

        return $this;
    }
    
    /**
     * parseSequenceNode
     *
     * @param  mixed $element
     * @return array
     */
    private function parseSequenceNode(DOMElement $element): array
    {

        $data;

        foreach($element->childNodes as $childNode) {
            $child_array;

            if($childNode instanceof DOMElement) {
                foreach($childNode->attributes as $key => $attr) {

                    if(in_array($attr->nodeName, ['ref', 'minOccurs','maxOccurs'])) {

                        $key = $attr->nodeName == 'ref' ? 'name' : $attr->nodeName;

                        if($attr->nodeName == 'maxOccurs' && $attr->nodeValue == 'unbounded') {
                            $child_array['max_occurs'] = -1;
                        } elseif($attr->nodeName == 'maxOccurs') {
                            $child_array['max_occurs'] = (int)$attr->nodeValue;
                        } elseif($attr->nodeName == 'minOccurs') {
                            $child_array['min_occurs'] = (int)$attr->nodeValue;
                        } else {
                            $child_array[$key] = $attr->nodeValue;
                        }

                        $child_array['help'] = $this->getAnnotation($childNode);
                    }
                }

                $data[] = $this->parseNodeTypes($child_array);
            }
        }

        return $data;

    }
    
    /**
     * parseNodeTypes
     *
     * @param  array $data
     * @return array
     */
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
            $data = array_merge($this->stub_validation, $data);

            ksort($data);
            return $data;
        }

        if(isset($this->type_map[$searchable_type])) {

            $data['name'] = $parsed_name;
            $data['base_type'] = $this->type_map[$searchable_type];

            $data = array_merge($this->stub_validation, $data);

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

        $relation = new \DOMDocument();

        match($parts[0]) {
            'cbc' => $type = (new CbcType())->getPrimativeType($parts[1]),
            'cac' => $type = (new CccType())->getPrimativeType($parts[1]),
            'ext' => $type = (new CccType())->getPrimativeType($parts[1]),
            'udt' => $type = (new CccType())->getPrimativeType($parts[1]),
            'ccts-cct' => $type = (new CccType())->getPrimativeType($parts[1]),
        };

        return $type ?? throw new \Exception("could not find related type {$related_type}");
    }
    
    /**
     * getType
     *
     * @param  string $name
     * @return string
     */
    public function getType(string $name): string
    {
        $base_type = $this->type_map[$name];

        $xpath = "//xsd:complexType [@name='{$base_type}']";
        $query = $this->getXPath($xpath);

        return $query->item(0)->getAttribute('type');
    }    
    
    /**
     * extractSequence
     *
     * @param  mixed $element
     * @return DOMNodeList
     */
    private function extractSequence(\DomElement $element): \DOMNodeList
    {
        return $this->getXPath("./{$this->prefix}:sequence", $element);
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
        $base_type = $this->type_map[$name];

        return ['base_type' => $base_type];
    }
}
