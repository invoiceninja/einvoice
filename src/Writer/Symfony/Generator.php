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
use DateTimeInterface;
use Nette\PhpGenerator\Type;
use Nette\PhpGenerator\Literal;
use Nette\PhpGenerator\Property;
use Nette\PhpGenerator\ClassType;
use Illuminate\Support\Collection;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Nette\PhpGenerator\PhpNamespace;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Invoiceninja\Einvoice\Writer\Symfony\TypeGenerator;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;

class Generator
{

    private array $standards = [
        'FatturaPA' => [
            'options' => [
                'set_serialized_name' => false,
            ]
        ],
        // 'FACT1' => [
        //     'options' => [
        //         'set_serialized_name' => true,
        //     ]
        // ],
        'Peppol' => [
            'options' => [
                'set_serialized_name' => true,
            ]
        ],
    ];

    public const LINE_FEED = "\n";

    public string $path_namespace = "Invoiceninja\Einvoice\Models\\";

    public string $write_path = "src/Models/";
    
    public string $standard = "";

    public Collection $document;

    private PhpNamespace $namespace;

    public Collection $child_classes;

    private bool $set_serialized_name = false;

    public function build()
    {
        foreach($this->standards as $key => $value)
        {

            $this->standard = $key;
            $this->setOptions();
            $this->child_classes = collect([]);

            $path = "src/Schema/{$this->standard}/{$this->standard}.json";

            $this->document = collect(json_decode(file_get_contents($path), 1));

            $this->document->each(function ($node, $key) {

                $class_name = str_replace("Type", "", $key);
                $this->writeClass($class_name, $node);

            });
        }
    }

    public function resolveType(string $raw_type): string
    {
        match($raw_type){
            'integer' => $type = 'int',
            'decimal' => $type = 'string',
            'date' => $type = DateTime::class,
            'time' => $type = DateTime::class,
            'dateTime' => $type = DateTime::class,
            'token' => $type = 'string',
            'base64Binary' => $type = 'mixed',
            'normalizedString' => $type = 'string',
            'boolean' => $type = 'bool',
            default => $type = $raw_type,
        };

        if(in_array($raw_type, ['time','dateTime'])){
            $this->namespace->addUse(DateTime::class);
        }

        if($raw_type == 'date')
            $this->namespace->addUse(Date::class);

        return $type;

    }

    public function isPrimative(string $type)
    {
        return in_array($type, ['int','integer','string','float','bool']);
    }

    public function setValidation(Property $property, array $element): Property
    {
        if($element['min_occurs'] >= 1 && count($element['resource']) == 0 && !in_array($element['base_type'], ['integer', 'decimal', 'float', 'double', 'string'])){
            $this->namespace->addUse(NotNull::class);
            $this->namespace->addUse(NotBlank::class);
            $this->namespace->addUse(Valid::class);
            $property->addAttribute(NotNull::class);
            $property->addAttribute(NotBlank::class);
            $property->addAttribute(Valid::class);
        }

        if($element['base_type'] == 'decimal'){
            $this->namespace->addUse(DecimalPrecision::class);
            $property->addAttribute(DecimalPrecision::class, [2]);
        }

        if($element['max_occurs'] > 1 || $element['max_occurs'] == -1 && !$this->isPrimative($element['base_type'])) {

            if($element['name'] == 'TaxTotal')
                echo print_r($element).PHP_EOL;

            $property->setType("array");
            // $property->setValue([]);
            $property->removeComment();
            $property->addComment("@var ".$element['name']."[]");
        }
        
        if(isset($element['max_length'])) {
            $this->namespace->addUse(Length::class);
            $property->addAttribute(Length::class, ['min' => $element['min_length'], 'max' => $element['max_length']]);
        }
        
        if($element['pattern']) {
            $this->namespace->addUse(Regex::class);
            $property->addAttribute(Regex::class, [$element['pattern']]);
        }

        if(in_array($element['base_type'], ['time', 'dateTime'])){
            $this->namespace->addUse(Context::class);
            $this->namespace->addUse(DateTimeNormalizer::class);
            $property->addAttribute(Context::class, [new Literal("[DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP']")]);
            // $property->addAttribute(DateTime::class, ['Y-m-d\TH:i:s.uP']);
        }

        if(in_array($element['base_type'], ['date'])) {
            $this->namespace->addUse(Context::class);
            $property->addAttribute(Context::class, [new Literal("[DateTimeNormalizer::FORMAT_KEY => 'Y-m-d']")]);
        }

        if(count($element['resource']) > 1){
            $this->namespace->addUse(Choice::class);
            $property->addAttribute(Choice::class, [array_keys($element['resource'])]);
        }

        if($this->isPrimative($element['base_type'])) {
            $property->removeComment();
            $property->addComment("@var ".$element['base_type']);
        }
        
        if($element['name'] == 'Causale') {
            $this->namespace->addUse(All::class);
            $property->setType('array');
            $property->setAttributes([]);
            $property->addAttribute(All::class, [new Literal('[new Length(min: 1,max: 200),new Regex(pattern: "/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,200}/u")]')]);
            $property->removeComment();
            $property->addComment("@var string[]");
        }

        if($this->set_serialized_name && isset($element['namespace'])) {
            $this->namespace->addUse(SerializedName::class);
            $property->addAttribute(SerializedName::class, [$element['namespace'].":".$element['name']]);
        }

        if($element['name'] == 'amount'){            
            $this->namespace->addUse(SerializedName::class);
            $property->addAttribute(SerializedName::class, ['#']);
        }

        if($element['name'] == 'currencyID') {
            $this->namespace->addUse(SerializedName::class);
            $property->addAttribute(SerializedName::class, ['@currencyID']);
        }
                
        if($element['name'] == 'unitCode') {
            $this->namespace->addUse(SerializedName::class);
            $property->addAttribute(SerializedName::class, ['@unitCode']);
        }

        return $property;
    }

    public function writeClass(string $name, mixed $type)
    {
        
        $this->namespace = new PhpNamespace($this->path_namespace.$this->standard);

        $this->namespace->addUse(Context::class);
        $this->namespace->addUse(DateTimeNormalizer::class);

        $class = new ClassType($name);

        foreach($type['elements'] as $key => $element) 
        {

            if($name == $element['name'])
                continue;

            if(stripos($element['base_type'], 'Type') !== false) {
                $type_object = $this->writeBaseType($element['name'], $element['base_type']);
                $this->namespace->addUse($this->path_namespace.$this->standard."\\".$element['base_type']."\\".$element['name']);
            }
            
            $base_type = stripos($element['base_type'], 'Type') !== false ? $this->path_namespace.$this->standard."\\".$element['base_type']."\\".$element['name'] : $this->resolveType($element['base_type']);

            $property = (new Property($element['name']))
                                        ->setPublic();

            if(stripos($element['base_type'], 'Type') === false){
                    $property->addComment("@var ".$base_type);
                    $property->setType($base_type);
            }else {
                $property->addComment("@var ".$element['name']);
            }

            $property = $this->setValidation($property, $element);

            if(count($element['resource']) > 0) {

                $class->addProperty($element['name']."_array")
                    ->setPrivate()
                    ->setType('array')
                    ->setValue(array_keys($element['resource']));
            }

            $class->addMember($property);

        }
                
        $this->namespace->add($class);

        $name = str_replace("Type", "", $name);
        $this->write($this->namespace, "{$this->write_path}{$this->standard}/{$name}.php");

    }


    public function getChildType(string $name)
    {
        return $this->document[$name];
    }

    private function writeBaseType($name, $base_type): \stdClass
    {

        $type_generator = new TypeGenerator($this, $name, $base_type);
        
        return $type_generator->init();

    }

    public function write($namespace, $path)
    {
                
        $class_print = "<?php ". self::LINE_FEED . self::LINE_FEED;
        $class_print .= $namespace;

        $pathinfo = pathinfo($path);

        if(!is_dir($pathinfo['dirname']))
            mkdir($pathinfo['dirname']);

        $fp = fopen($path, 'w');
        fwrite($fp, $class_print);
        fclose($fp);

    }

    private function setOptions(): self
    {
        $options = $this->standards[$this->standard]['options'];

        foreach($options as $key => $value){
            $this->{$key} = $value;
        }

        return $this;
    }
}