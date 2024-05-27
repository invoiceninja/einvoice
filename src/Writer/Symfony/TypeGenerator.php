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

use DateTime;
use stdClass;
use DateTimeInterface;
use Nette\PhpGenerator\Property;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

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
        $this->namespace->addUse(NotNull::class);
        $this->namespace->addUse(NotBlank::class);
        $this->namespace->addUse(DateTimeInterface::class);
        $this->namespace->addUse(DateTimeNormalizer::class);
        $this->namespace->addUse(DateTime::class);
        $this->namespace->addUse(Valid::class);
        $this->namespace->addUse(Context::class);
        $this->namespace->addUse(Regex::class);
        $this->namespace->addUse(Choice::class);
        $this->namespace->addUse(Length::class);
        $this->namespace->addUse(DecimalPrecision::class);
        $this->namespace->addUse(All::class);
        $this->namespace->addUse(SerializedName::class);

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

        $this->namespace->addUse(DateTime::class);

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

                if(in_array($base_type, ['date','dateTime','time'])) {
                    $base_type = "Datetime";
                }

            }

            $settable_type = "{$base_type}";

            $property = (new Property($element['name']))
                        ->setPublic();
            
            if(stripos($element['base_type'], 'Type') === false) {
                $property->addComment("@var ".$settable_type);
                $property->setType($settable_type);
            }
            else {
                $property->addComment("@var ".$element['name']);
            }

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
