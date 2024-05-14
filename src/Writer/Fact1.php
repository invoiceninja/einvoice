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
use Invoiceninja\Einvoice\Writer\Rules\Fact1Rules;
use Invoiceninja\Einvoice\Writer\Types\CacType;
use Invoiceninja\Einvoice\Writer\Types\CbcType;
use Invoiceninja\Einvoice\Writer\Types\ExtType;

class Fact1 extends BaseStandard
{

    public string $prefix = "xsd";

    private ExtType $extType;
    private CacType $cacType;
    private CbcType $cbcType;

    private array $type_tracker = [];

    public string $path = "src/Standards/FACT1/UBL-Invoice-2.1.xsd";

    public string $standard = "FACT1";

        
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
                'help' => $this->getAnnotation($element)
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

    private function childTypes(): self
    {
        
        /*
        
$child_types = collect($this->data)->flatMap(function ($elements) {

    return collect($elements['elements'])->map(function ($element) {

        if(stripos($element['base_type'], 'Type') !== false && !in_array($element['base_type'], $this->type_tracker)) {

            $this->type_tracker[] = $element['base_type'];
            return $element['base_type'];

        }
        return false;

    })
    ->filter(function ($e) {
        return $e;
    })
    ->flatten();

})
        ->unique()
        ->map(function ($t) {

            return collect($this->cacType->elements)->first(function ($node) use ($t) {
                return $node['type'] == $t;
            });

        });

$nested_level_one = $child_types->filter(function ($level_one) {
    return isset($level_one['elements']);
})
->flatMap(function ($level_one) {

    return collect($level_one['elements'])->map(function ($element) {

        if(stripos($element['base_type'], 'Type') !== false && !in_array($element['base_type'], $this->type_tracker)) {

            $this->type_tracker[] = $element['base_type'];
            return $element['base_type'];

        }
        return false;

    })
    ->filter(function ($e) {
        return $e;
    })
    ->flatten();

})
->unique()
->map(function ($t) {

    return collect($this->cacType->elements)->first(function ($node) use ($t) {
        return $node['type'] == $t;
    });

});

$nested_level_two = $child_types->filter(function ($nested_level_one) {
    return isset($nested_level_one['elements']);
})
->flatMap(function ($level_one) {

    return collect($level_one['elements'])->map(function ($element) {

        if(stripos($element['base_type'], 'Type') !== false && !in_array($element['base_type'], $this->type_tracker)) {

            $this->type_tracker[] = $element['base_type'];
            return $element['base_type'];

        }
        return false;

    })
    ->filter(function ($e) {
        return $e;
    })
    ->flatten();

})
->unique()
->map(function ($t) {

    return collect($this->cacType->elements)->first(function ($node) use ($t) {
        return $node['type'] == $t;
    });

});
*/
        $types = collect();

        foreach($this->data as $key => $elements) {

            foreach($elements['elements'] as $eKey => $element) {
                if(stripos($element['base_type'], 'Type') !== false) {

                    if(!in_array($element['base_type'], $this->type_tracker)) {
                        $this->type_tracker[] = $element['base_type'];
                    }

                    $types->push($element['base_type']);
                }

            }
        }
        
        /** harvest only the unique types to populate*/
        $child_types = $types->unique()->map(function ($t) {

            return collect($this->cacType->elements)->first(function ($node) use($t){
                return $node['type'] == $t;
            });

        })->toArray();

        $infants = [];

        foreach($child_types as $infant_type) {

            if(isset($infant_type['elements'])) {
                foreach($infant_type['elements'] as $e) {

                    if(stripos($e['base_type'], 'Type') !== false && !in_array($e['base_type'], $this->type_tracker)) {

                        foreach($this->cacType->elements as $node) {
                            if($node['type'] == $e['base_type']) {
                                $this->type_tracker[] = $e['base_type'];
                                $infants[$e['name']] = $node;
                                break;
                            }
                        }

                    }

                }
            }

        }

        $neonates = [];

        foreach($infants as $neonate) {

            if(isset($neonate['elements'])) {
                foreach($neonate['elements'] as $e) {

                    if(stripos($e['base_type'], 'Type') !== false && !in_array($e['base_type'], $this->type_tracker)) {

                        foreach($this->cacType->elements as $node) {

                            if($node['type'] == $e['base_type']) {

                                $this->type_tracker[] = $e['base_type'];

                                $neonates[$e['name']] = $node;
                                break;
                            }
                        }


                    }

                }
            }

        }


        $foetuses = [];

        foreach($neonates as $foetus) {

            if(isset($foetus['elements'])) {
                foreach($foetus['elements'] as $e) {

                    if(stripos($e['base_type'], 'Type') !== false && !in_array($e['base_type'], $this->type_tracker)) {

                        foreach($this->cacType->elements as $node) {
                            if($node['type'] == $e['base_type']) {
                                $this->type_tracker[] = $e['base_type'];
                                $foetuses[$e['name']] = $node;
                                break;
                            }
                        }


                    }

                }
            }

        }

        foreach($child_types as $type) {

            $new_set = [];
            foreach($type['elements'] as $stub) {
                $new_set[$stub['name']] = $stub;
            }
            $type['elements'] = $new_set;

            $this->data[$type['type']] = (object)$type;
        }

        foreach($infants as $infant) {

            $new_set = [];

            if(isset($infant['elements'])) {

                foreach($infant['elements'] as $key => $stub) {
                    $new_set[$stub['name']] = $stub;
                }
                $infant['elements'] = $new_set;

            }

            $this->data[$infant['type']] = (object)$infant;

        }

        foreach($neonates as $neonate) {

            $new_set = [];
            if(isset($neonate['elements'])) {

                foreach($neonate['elements'] as $key => $stub) {
                    $new_set[$stub['name']] = $stub;
                }
                $neonate['elements'] = $new_set;
            }

            $this->data[$neonate['type']] = (object)$neonate;
        }

        foreach($foetuses as $foetus) {

            $new_set = [];

            if(isset($foetus['elements'])) {
                foreach($foetus['elements'] as $key => $stub) {
                    $new_set[$stub['name']] = $stub;
                }
                $foetus['elements'] = $new_set;
            }

            $this->data[$foetus['type']] = (object)$foetus;
        }

        return $this;
    }


    private function harvestNode(string $name)
    {

        $parts = explode(":", $name);

        match($parts[0]) {
            'cac' => $type = $this->cacType,
            'cbc' => $type = $this->cbcType,
            'ext' => $type = $this->extType,
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
