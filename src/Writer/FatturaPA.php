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

namespace Invoiceninja\Einvoice\Writer;

use DOMElement;

class FatturaPA extends BaseStandard
{

    public string $path = "src/Standards/FatturaPA/Schema_del_file_xml_FatturaPA_v1.2.2.xsd";

    public string $standard = "FatturaPA";
    
    public function __construct()
    {

    }

    public function init()
    {

        $this->document = new \DomDocument();
        
        $this->document->load($this->path);

        $this->mapTypes()
        ->getParentTypes()
        ->write();

    }
    
    /**
     * getParentTypes
     *
     * Iterate through all complex types of the schema definition
     * and build type and element maps
     * 
     * @return self
     */
    private function getParentTypes(): self
    {


        $complexTypes = $this->document->getElementsByTagName('complexType');

        foreach($complexTypes as $type) {

            $set = [];

            if($type instanceof \DOMElement) {

                $set['type'] = $type->getAttribute('name');
                $set['help'] = $this->extractAnnotation($type);

                $sequence = $this->extractSequence($type);

                $choice_array = $this->extractChoice($sequence->item(0));

                $choice_keys = [];

                foreach($choice_array as $key => $arr) {
                    $choice_keys[] = array_keys($arr);
                }

                $set['choices'] = $choice_keys;

                $sequence_list = $this->processSequences($sequence);

                $set['elements'] = count($sequence_list) > 0 ? $sequence_list : [];

                $this->data[$set['type']] = $set;

            }
        }

        return $this;
    }

    
    /**
     * processSequences
     *
     * Harvests a list of child elements of the "Type:
     * 
     * @param  \DOMNodeList $list
     * @return array
     */
    private function processSequences(\DOMNodeList $list): array
    {
        $data = [];

        for($x = 0; $x < $list->count(); $x++) {
            $node = $list->item($x);

            $choice_array = $this->extractChoice($node);

            foreach($choice_array as $selection) {
                foreach($selection as $key => $select) {
                    $select['resource'] = $this->extractResource($select['type'] ?? $select['base_type']);
                    $select = array_merge($select, $this->extractRestriction($select['type'] ?? $select['base_type']));
                    $data[$key] = $select;
                }
            }

            $child_array = [];

            foreach($node->childNodes as $childNode) {

                if($childNode instanceof \DomElement) {
                    $child_array = $this->extractAttributes($childNode);

                    if(is_array($child_array) && !isset($child_array['name']) || is_null($child_array['name'])) {
                        continue;
                    }

                    if(count($child_array) > 0) {

                        $child_array['help'] = $this->extractAnnotation($childNode);
                        $child_array['resource'] = $this->extractResource($child_array['type'] ?? $child_array['base_type']);

                        $child_array = array_merge($child_array, $this->extractRestriction($child_array['type'] ?? $child_array['base_type']));
                            unset($child_array['type']);
                    
                        if(!isset($child_array['base_type']) && isset($child_array['name'])) {
                            $child_array['base_type'] = $this->type_map[$child_array['name']];
                        }

                        $data[$child_array['name']] = array_merge($this->stub_validation, $child_array);
                    }

                }

            }

        }

        return $data;

    }
    
    /**
     * processChoiceSequence
     *
     * Some types require a choice between 
     * sets of fields, the choice array
     * holds the "choice keys" of each set
     * @param  DomNodeList $list
     * @return array
     */
    private function processChoiceSequence(\DomNodeList $list): array
    {

        $data = [];

        for($x = 0; $x < $list->count(); $x++) {
            $node = $list->item($x);

            $child_array = [];

            foreach($node->childNodes as $childNode) {

                if($childNode instanceof \DomElement) {

                    $key = $childNode->getAttribute('name');
                    
                    echo $key.PHP_EOL;
                    echo print_r($child_array).PHP_EOL;

                    $child_array[$key] = array_merge($this->stub_validation, $this->extractAttributes($childNode));

                }

            }

            $data[] = $child_array;

        }

        echo "data = ".PHP_EOL;
        echo print_r($data).PHP_EOL;
        return $data;

    }


    private function extractAttributes(\DomElement $childNode): array
    {
        $child_array = [];

        foreach($childNode->attributes as $key => $attr) {
            if(in_array($attr->nodeName, ['name','type','minOccurs','maxOccurs'])) {

                if($attr->nodeName == 'type')
                    $key = 'base_type';
                elseif($attr->nodeName == 'minOccurs')
                    $key = 'min_occurs';
                elseif($attr->nodeName == 'maxOccurs')
                    $key = 'max_occurs';
                else 
                    $key = $attr->nodeName;
            
                $child_array[$key] = is_numeric($attr->nodeValue) ? (int)$attr->nodeValue : $attr->nodeValue;
            }
        }

        if(!isset($child_array['min_occurs']))
            $child_array['min_occurs'] = 1;
            
        if(!isset($child_array['max_occurs'])) {
            $child_array['max_occurs'] = 1;
        }

        $child_array['max_occurs'] = $child_array['max_occurs'] == 'unbounded' ? -1 : $child_array['max_occurs'];

        return $child_array;

    }

    private function extractSequence(\DomElement $element): \DOMNodeList
    {

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:sequence', $element);

        return $result;
    }

    private function extractChoice(\DomElement $element): array
    {
        $data = [];

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:choice//xs:sequence', $element);

        $data = $this->processChoiceSequence($result);

        return $data;

    }

    private function extractAnnotation(\DomElement $element): string
    {

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:annotation//xs:documentation', $element);

        return $result->count() > 0 ? $result->item(0)->nodeValue : '';

    }

    private function mapTypes(): self
    {

        $types = $this->document->getElementsByTagName('element');

        foreach($types as $type) {
            if($type instanceof \DOMElement && $type->hasAttribute(('type'))) {
                $this->type_map[$type->getAttribute(('name'))] = $type->getAttribute('type');
            }
        }

        return $this;
    }

    
    /**
     * extractResource
     *
     * Extracts the dropdown selection key/value pairs
     * 
     * @param  ?string $type
     * @return array
     */
    public function extractResource(?string $type): array
    {
        if(!$type) {
            return [];
        }

        $resource = [];

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:simpleType [@name="'.$type.'"]//xs:restriction');

        if($result->count() == 0) {
            return $resource;
        }

        $node = $result->item(0);

        foreach($node->childNodes as $childNode) {

            if($childNode instanceof \DomElement && $childNode->localName == 'enumeration') {

                $key = $childNode->getAttribute('value');
                $annotation = $this->extractAnnotation($childNode);

                $resource[$key] = strlen($annotation) > 1 ? $annotation : $key;

            }

        }

        return $resource;
    }
    
    /**
     * extractRestriction
     *
     * Returns the required validation array
     * 
     * @param  string $type
     * @return array
     */
    private function extractRestriction(string $type): array
    {
        $resource = [];

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:simpleType [@name="'.$type.'"]//xs:restriction');

        if($result->count() == 0) {
            return $resource;
        }

        $node = $result->item(0);

        if($node instanceof DOMElement)
        {
     
            if($node->hasAttribute('base')) {
                $resource['base_type'] = str_replace("xs:", "", $node->getAttribute('base'));
            } else {
                $resource['base_type'] = $this->type_map[$type] ?? str_replace("xs:", "", $type);
            }

            foreach($node->childNodes as $childNode) {

                if($childNode instanceof \DomElement) {

                    if(!in_array($childNode->localName, ['enumeration']) && in_array($childNode->localName, array_keys($this->stub_validation))) {

                        $resource[$this->camelToSnake($childNode->localName)] = $childNode->getAttribute("value");

                    }
                }

            }
        }

        //Extracts the regex pattern
        if(isset($resource['pattern'])) {
            $resource = $this->extractPattern($resource);
        }

        return $resource;

    }

    
    /**
     * extractPattern
     *
     * @param  array $resource
     * @return array
     */
    private function extractPattern($resource): array
    {
        $parts = [];

        if (preg_match('/{([^{}]+)}[^{}]*$/', $resource['pattern'], $matches)) {
            $contents = $matches[1];
            $parts = explode(",", $contents);
        }

        if(count($parts) == 2 && $resource['base_type'] == 'normalizedString') {

            $resource['min_length'] = (int)$parts[0];
            $resource['max_length'] = (int)$parts[1];
            $resource['base_type'] = 'string';

        }

        if(count($parts) == 1 && $resource['base_type'] == 'string') {

            $resource['min_length'] = (int)$parts[0];
            $resource['max_length'] = (int)$parts[0];
            $resource['base_type'] = 'string';

        }

        if(count($parts) == 2 && $resource['base_type'] == 'string') {

            $resource['min_length'] = (int)$parts[0];
            $resource['max_length'] = (int)$parts[1];
            $resource['base_type'] = 'string';

        }

        return $resource;

    }

}
