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

use Carbon\Carbon;
use Nette\PhpGenerator\Type;
use Spatie\LaravelData\Data;
use Nette\PhpGenerator\Printer;
use Nette\PhpGenerator\Property;
use Spatie\LaravelData\Optional;
use Nette\PhpGenerator\ClassType;
use Illuminate\Support\Collection;
use Nette\PhpGenerator\PhpNamespace;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Invoiceninja\Einvoice\Models\Rules\StringArrayRule;
use Spatie\LaravelData\Attributes\Validation\RequiredWith;
use Spatie\LaravelData\Attributes\Validation\RequiredWithoutAll;

class Generator
{
    public const LINE_FEED = "\n";

    private array $standards = [
        'FACT1',
        'FatturaPA'
    ];

    public Collection $child_classes;

    public Collection $document;

    public string $namespace = "Invoiceninja\Einvoice\Models\\";

    public string $standard = "";

    public string $write_path = "src/Models/";

    public function __construct()
    {
    }

    public function build()
    {
        $this->child_classes = collect([]);

        $this->standard = "FatturaPA";
        $path = "src/Schema/{$this->standard}/{$this->standard}.json";

        $this->document = collect(json_decode(file_get_contents($path),1));

        $this->document->each(function ($node, $key){

            $class_name = str_replace("Type", "", $key);
            $this->writeNette($class_name, $node);

        });

        $this->handleSpecialClasses();

    }

    private function handleSpecialClasses()
    {
        
        $namespace = new PhpNamespace($this->namespace.$this->standard."\\DatiGeneraliDocumentoType");
        $namespace->addUse(Data::class);
        $namespace->addUse(Carbon::class);

        $path = 'src/Models/FatturaPA/DatiGeneraliDocumentoType/DatiGeneraliDocumento.php';
        
        $f = file_get_contents($path);

        $class = ClassType::fromCode($f);
        $class->setExtends(Data::class);

        $class->removeProperty('Causale');

        $property = (new Property('Causale'))
        ->setPublic()
        ->setType(Type::union('array', Optional::class));

        $property->addAttribute(StringArrayRule::class);

        $class->addMember($property);

        $namespace->add($class);

        $this->write($namespace,$path);


$namespace = new PhpNamespace($this->namespace.$this->standard."\\AnagraficaType");
$namespace->addUse(Data::class);
$namespace->addUse(Carbon::class);

$path = 'src/Models/FatturaPA/Anagrafica.php';

$f = file_get_contents($path);

$class = ClassType::fromCode($f);
$class->setExtends(Data::class);

$class->removeProperty('Denominazione');
$class->removeProperty('Nome');
$class->removeProperty('Cognome');

$property = (new Property('Denominazione'))
->setPublic()
->setType(Type::union('string', Optional::class));
$property->addAttribute(Max::class, [80]);
$property->addAttribute(Min::class, [1]);
$property->addAttribute(RequiredWithoutAll::class, ['Cognome','Nome']);
$class->addMember($property);

$property = (new Property('Cognome'))
->setPublic()
->setType(Type::union('string', Optional::class));
$property->addAttribute(Max::class, [80]);
$property->addAttribute(Min::class, [1]);
$property->addAttribute(RequiredWith::class, ['Nome']);
$class->addMember($property);

$property = (new Property('Nome'))
->setPublic()
->setType(Type::union('string', Optional::class));
$property->addAttribute(Max::class, [80]);
$property->addAttribute(Min::class, [1]);
$property->addAttribute(RequiredWith::class, ['Cognome']);
$class->addMember($property);


$namespace->add($class);

$this->write($namespace, $path);

        
    }

    public function getChildType(string $name)
    {
        return $this->document[$name];
    }

    public function resolveType(string $type): string
    {
        return match($type){
            'integer' => $type = 'int',
            'decimal' => $type = 'float',
            'date' => $type = 'Carbon',
            'dateTime' => $type = 'Carbon',
            'token' => $type = 'string',
            'base64Binary' => $type = 'mixed',
            'normalizedString' => $type = 'string',
            default => $type = $type,
        };

    }

    public function writeNette(string $name, mixed $type)
    {

        $namespace = new PhpNamespace($this->namespace.$this->standard);
        $namespace->addUse(Data::class);
        $namespace->addUse(Carbon::class);

        $class = new ClassType($name);
        $class->setExtends(Data::class);

        foreach($type['elements'] as $key => $element) {

            if($name == $element['name'])
                continue;

            //if it has a type, resolve now, write it, and then continue!

            if(stripos($element['base_type'], 'Type') !== false ){
                $type_object = $this->writeBaseType($element['name'], $element['base_type']);
                $namespace->addUse($this->namespace.$this->standard."\\".$element['base_type']."\\".$element['name']);
            }

            // $standard_type_path = $this->namespace.$this->standard."\\".$element['base_type']."\\".$element['name'];
            $base_type = stripos($element['base_type'], 'Type') !== false ? $this->namespace.$this->standard."\\".$element['base_type']."\\".$element['name'] : $this->resolveType($element['base_type']);

            if(in_array($base_type,['date','dateTime','Carbon'])){
                $namespace->addUse(Carbon::class);
                $base_type = Carbon::class;
            }

            if($element['min_occurs'] == 0){
                
                $namespace->addUse(Optional::class);
                $type = Type::union($base_type, Optional::class);

            }
            else {    
                $type = $base_type;
            } 

            $class->addProperty($element['name'])
                ->setPublic() 
                ->setType($type);

            if(count($element['resource']) > 0){
                $class->addProperty($element['name']."_array")
                      ->setPublic()
                      ->setType('array')
                      ->setValue($element['resource']);
            }
        }

        $namespace->add($class);

        $name = str_replace("Type","",$name);
        $this->write($namespace, "{$this->write_path}{$this->standard}/{$name}.php");
        
        //check for addition child types to write NOW
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
