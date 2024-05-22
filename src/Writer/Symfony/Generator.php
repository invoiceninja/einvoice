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

use Carbon\Carbon;
use Nette\PhpGenerator\Type;
use Nette\PhpGenerator\Property;
use Nette\PhpGenerator\ClassType;
use Illuminate\Support\Collection;
use Nette\PhpGenerator\PhpNamespace;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Invoiceninja\Einvoice\Writer\Symfony\TypeGenerator;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;

class Generator
{
    public const LINE_FEED = "\n";

    public string $path_namespace = "Invoiceninja\Einvoice\Models\Symfony\\";

    public string $write_path = "src/Models/Symfony/";
    
    public string $standard = "";

    public Collection $document;

    private PhpNamespace $namespace;

    public Collection $child_classes;

    public function build()
    {
        $this->standard = 'FatturaPA';
        $this->child_classes = collect([]);

        $path = "src/Schema/{$this->standard}/{$this->standard}.json";

        $this->document = collect(json_decode(file_get_contents($path), 1));

        $this->document->each(function ($node, $key) {

            $class_name = str_replace("Type", "", $key);
            $this->writeClass($class_name, $node);

        });

    }

    public function resolveType(string $raw_type): string
    {
        match($raw_type){
            'integer' => $type = 'int',
            'decimal' => $type = 'float',
            'date' => $type = Carbon::class,
            'time' => $type = Carbon::class,
            'dateTime' => $type = Carbon::class,
            'token' => $type = 'string',
            'base64Binary' => $type = 'mixed',
            'normalizedString' => $type = 'string',
            'boolean' => $type = 'bool',
            default => $type = $raw_type,
        };

        if($type == Carbon::class);  
            $this->namespace->addUse(Carbon::class);

        if(in_array($raw_type, ['time','dateTime'])){
            $this->namespace->addUse(DateTime::class);
        }

        if($raw_type == 'date')
            $this->namespace->addUse(Date::class);

        return $type;

    }

    public function setValidation(Property $property, array $element): Property
    {
        if($element['min_occurs'] >= 1){
            $this->namespace->addUse(NotNull::class);
            $this->namespace->addUse(NotBlank::class);

            $property->addAttribute(NotNull::class);
            $property->addAttribute(NotBlank::class);
        }

        if($element['max_occurs'] > 1 || $element['max_occurs'] == -1) {
            $property->addComment("@var ".$element['name']."[] $".$element['name']);
        }

        if(isset($element['max_length'])) {
            $this->namespace->addUse(Length::class);
            $property->addAttribute(Length::class, ['max' => $element['max_length']]);
        }
        
        if(isset($element['max_length'])) {
            $this->namespace->addUse(Length::class);
            $property->addAttribute(Length::class, ['min' => $element['min_length']]);
        }

        if($element['pattern']) {
            $this->namespace->addUse(Regex::class);
            $property->addAttribute(Regex::class, [$element['pattern']]);
        }

        if(in_array($element['base_type'], ['time', 'dateTime']))
            $property->addAttribute(DateTime::class, ['Y-m-d\TH:i:s.uP']);

        if(in_array($element['base_type'], ['date'])) {
            $property->addAttribute(Date::class, ['Y-m-d']);
        }


        return $property;
    }

    public function writeClass(string $name, mixed $type)
    {
        
        $this->namespace = new PhpNamespace($this->path_namespace.$this->standard);

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
                                        ->setPublic()
                                        ->setType($base_type);



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

}