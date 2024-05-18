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

namespace Invoiceninja\Einvoice\Writer\Generator;

use stdClass;
use Carbon\Carbon;
use Nette\PhpGenerator\Type;
use Spatie\LaravelData\Data;
use Nette\PhpGenerator\Printer;
use Nette\PhpGenerator\Property;
use Spatie\LaravelData\Optional;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class TypeGenerator
{

    private PhpNamespace $namespace;

    private ClassType $class;

    public function __construct(protected Generator $generator, protected string $name, protected string $type)
    {
    }

    public function init(): stdClass
    {
        $this->namespace = new PhpNamespace($this->generator->namespace.$this->generator->standard."\\".$this->type);
        $this->class = new ClassType($this->name);

        $this->build();

        $response = new \stdClass;
        $response->namespace = $this->namespace;
        $response->class = $this->class;

        $name = str_replace("Type", "", $this->name);

        $this->generator->write($this->namespace, "{$this->generator->write_path}{$this->generator->standard}/$this->type/{$name}.php");

        return $response;
    }

    private function build(): self
    {

        $this->namespace->addUse(Data::class);
        $this->namespace->addUse(Optional::class);
        $this->namespace->addUse(Carbon::class);

        $this->class->setExtends(Data::class);

        $child_type = $this->generator->getChildType($this->type);

        foreach($child_type['elements'] as $key => $element)
        {
            if($this->name == $element['name'])
                continue;

            if(stripos($element['base_type'], 'Type') !== false) {
                $base_type = $this->generator->namespace.$this->generator->standard."\\".$element['base_type']."\\".$element['name'];
                $this->namespace->addUse($base_type);
                $this->generator->child_classes->push($element);
            }
            else {
                $base_type = $this->generator->resolveType($element['base_type']);

                if(in_array($base_type, ['date','dateTime','Carbon'])){
                    $base_type = "Carbon\Carbon";
                }

            }

            if($element['min_occurs'] == 0){
                $settable_type = Type::union($base_type, Optional::class);
            }
            else {
                $settable_type = $base_type;

                if(in_array($settable_type, ['string','float']))
                    $settable_type = "?{$settable_type}";
            }

            $property = (new Property($element['name']))
                            ->setPublic()
                            ->setType($settable_type);
                            
            if($base_type == 'float') {
                $this->namespace->addUse(WithTransformer::class);
                $this->namespace->addUse(FloatTransformer::class);
                $property->addAttribute(WithTransformer::class, [FloatTransformer::class]);
            }

            if(isset($element['max_length'])) {
                $this->namespace->addUse(Max::class);
                $property->addAttribute(Max::class, [$element['max_length']]);
            }
            
            if(isset($element['min_length'])) {
                $this->namespace->addUse(Min::class);
                $property->addAttribute(Min::class, [$element['min_length']]);
            }

            if($element['pattern']){
                $this->namespace->addUse(Regex::class);
                $property->addAttribute(Regex::class, [$element['pattern']]);
            }

            if($element['base_type'] == 'date'){
                $this->namespace->addUse(DateTimeInterfaceTransformer::class);
                $this->namespace->addUse(WithTransformer::class);
                $property->addAttribute(WithTransformer::class, [DateTimeInterfaceTransformer::class, 'format' => 'Y-m-d']);
            }
            
            if($element['base_type'] == 'dateTime') {
                $this->namespace->addUse(DateTimeInterfaceTransformer::class);
                $this->namespace->addUse(WithTransformer::class);
                $property->addAttribute(WithTransformer::class, [DateTimeInterfaceTransformer::class, 'format' => 'Y-m-d\TH:i:s.uP']);
            }

            $this->class->addMember($property);

            if(count($element['resource']) > 0){
                $this->class
                    ->addProperty($element['name']."_array")
                    ->setPublic()
                    ->setType('array')
                    ->setValue($element['resource']);
            }
        }

        $this->namespace->add($this->class);

        return $this;
    } 

}