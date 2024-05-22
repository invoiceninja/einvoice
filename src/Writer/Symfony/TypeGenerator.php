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

namespace Invoiceninja\Einvoice\Writer\Symfony;

use stdClass;
use Carbon\Carbon;
use Nette\PhpGenerator\Type;
use Spatie\LaravelData\Data;
use Nette\PhpGenerator\Printer;
use Nette\PhpGenerator\Property;
use Spatie\LaravelData\Optional;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Contracts\DataObject;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;

class TypeGenerator
{
    private PhpNamespace $namespace;

    private ClassType $class;

    public function __construct(protected Generator $generator, protected string $name, protected string $type)
    {
    }

    public function init(): stdClass
    {
        $this->namespace = new PhpNamespace($this->generator->path_namespace.$this->generator->standard."\\".$this->type);
        $this->class = new ClassType($this->name);

        $this->build();

        $response = new \stdClass();
        $response->namespace = $this->namespace;
        $response->class = $this->class;

        $name = str_replace("Type", "", $this->name);

        $this->generator->write($this->namespace, "{$this->generator->write_path}{$this->generator->standard}/$this->type/{$name}.php");

        return $response;
    }

    private function build(): self
    {

        $this->namespace->addUse(Carbon::class);

        $child_type = $this->generator->getChildType($this->type);


        foreach($child_type['elements'] as $key => $element) {
            if($this->name == $element['name']) {
                continue;
            }

            if(stripos($element['base_type'], 'Type') !== false) {
                $base_type = $this->generator->path_namespace.$this->generator->standard."\\".$element['base_type']."\\".$element['name'];
                $this->namespace->addUse($base_type);
                $this->generator->child_classes->push($element);
            } else {
                $base_type = $this->generator->resolveType($element['base_type']);

                if(in_array($base_type, ['date','dateTime','Carbon','time'])) {
                    $base_type = "Carbon\Carbon";
                }

            }

            $settable_type = "{$base_type}";
            
            $property = (new Property($element['name']))
                            ->setPublic()
                            ->setType($settable_type);

            $property = $this->generator->setValidation($property, $element);

            $this->class->addMember($property);

            if(count($element['resource']) > 0) {
                $this->class
                    ->addProperty($element['name']."_array")
                    ->setPrivate()
                    ->setType('array')
                      ->setValue(array_keys($element['resource']));
            }
        }

        $this->namespace->add($this->class);

        return $this;
    }

}
