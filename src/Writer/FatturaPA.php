<?php

namespace Invoiceninja\Einvoice\Writer;

use DOMElement;
use Illuminate\Support\Collection;

class FatturaPA
{
    private array $stub_validation = [
             "name" => null,
             "base_type" => null,
             "resource" => [],
             "max_length" => null,
             "min_length" => null,
             "pattern" => null,
             "min_occurs" => null,
             "max_occurs" => null,
     ];

    protected \DomDocument $document;
    private array $type_map = [];
    private array $data = [];
    public object $final;

    public function __construct()
    {

    }

    public function init()
    {


        $this->document = new \DomDocument();
        $this->document->load("src/FatturaPA/Schema_del_file_xml_FatturaPA_v1.2.2.xsd");


        $this->mapTypes()
        ->getParentTypes();

        $this->final = new \stdClass();
        $this->final = (object)$this->data;

        $elementsString = json_encode($this->final, JSON_PRETTY_PRINT);
        $fp = fopen("./stubs/FatturaPAOBJ.json", 'w');
        fwrite($fp, $elementsString);
        fclose($fp);

    }

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


    private function processSequences(\DOMNodeList $list): array
    {
        $data = [];

        for($x = 0; $x < $list->count(); $x++) {
            $node = $list->item($x);

            $choice_array = $this->extractChoice($node);

            foreach($choice_array as $selection) {
                foreach($selection as $select) {
                    $data[] = $select;
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

                        $annotation = $this->extractAnnotation($childNode);
                        $child_array['help'] = $annotation;
                        $child_array['resource'] = $this->extractResource($child_array['type'] ?? false);

                        if(isset($child_array['type'])) {
                            $child_array = array_merge($child_array, $this->extractRestriction($child_array['type']));
                            unset($child_array['type']);
                        }

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

    private function processChoiceSequence(\DomNodeList $list): array
    {

        $data = [];

        for($x = 0; $x < $list->count(); $x++) {
            $node = $list->item($x);

            $child_array = [];

            foreach($node->childNodes as $childNode) {

                if($childNode instanceof \DomElement) {

                    $key = $childNode->getAttribute('name');

                    $child_array[$key] = array_merge($this->stub_validation, $this->extractAttributes($childNode));

                }

            }

            $data[] = $child_array;

        }

        return $data;

    }


    private function extractAttributes(\DomElement $childNode): array
    {
        $child_array = [];

        foreach($childNode->attributes as $key => $attr) {
            if(in_array($attr->nodeName, ['name','type','minOccurs','maxOccurs'])) {

                $key = $attr->nodeName == 'type' ? 'base_type' : $attr->nodeName;

                $key = $attr->nodeName == 'minOccurs' ? 'min_occurs' : $attr->nodeName;

                $key = $attr->nodeName == 'maxOccurs' ? 'max_occurs' : $attr->nodeName;

                $child_array[$key] = $attr->nodeValue;
            }
        }

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


    public function extractResource(?string $type)
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


        // switch($type){
        //     case "String10Type":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 10;
        //     break;
        //     case "String15Type":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 15;
        //     break;
        //     case "String20Type":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 20;
        //     break;
        //     case "String35Type":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 35;
        //     break;
        //     case "String60Type":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 60;
        //     break;
        //     case "String80Type":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 80;
        //     break;
        //     case "String100Type":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 100;
        //     break;
        //     case "String35LatinExtType":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 35;
        //     break;
        //     case "String60LatinType":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 60;
        //     break;
        //     case "String80LatinType":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 80;
        //     break;
        //     case "String100LatinType":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 100;
        //     break;
        //     case "String200LatinType":
        //         $resource['min_length'] = 1;
        //         $resource['max_length'] = 200;
        //     break;
        //     case "String1000LatinType":
        //         $resource['min_length'] = 10;
        //         $resource['max_length'] = 1000;
        //     break;

        // }

        foreach($node->childNodes as $childNode) {

            if($childNode instanceof \DomElement && $childNode->localName == 'enumeration') {

                $key = $childNode->getAttribute('value');
                $annotation = $this->extractAnnotation($childNode);

                $resource[$key] = strlen($annotation) > 1 ? $annotation : $key;

            }

        }


        return $resource;
    }

    private function extractRestriction(string $type)
    {

        $resource = [];

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:simpleType [@name="'.$type.'"]//xs:restriction');

        if($result->count() == 0) {
            return $resource;
        }

        $node = $result->item(0);


        if($node->hasAttribute('base')) {
            $resource['base_type'] = str_replace("xs:", "", $node->getAttribute('base'));
        } else {
            $resource['base_type'] = $this->type_map[$type] ?? str_replace("xs:", "", $type);
        }

        foreach($node->childNodes as $childNode) {

            if($childNode instanceof \DomElement) {

                if(!in_array($childNode->localName, ['enumeration'])) {

                    $resource[$this->camelToSnake($childNode->localName)] = $childNode->getAttribute("value");

                }
            }

        }

        if(isset($resource['pattern'])) {
            $resource = $this->extractPattern($resource);
        }

        return $resource;

    }


    private function extractPattern($resource)
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

    private function camelToSnake(string $camelCase): string
    {
        $result = '';

        for ($i = 0; $i < strlen($camelCase); $i++) {
            $char = $camelCase[$i];

            if (ctype_upper($char)) {
                $result .= '_' . strtolower($char);
            } else {
                $result .= $char;
            }
        }

        return ltrim($result, '_');
    }


}
