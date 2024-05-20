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
use Nette\PhpGenerator\Property;
use Spatie\LaravelData\Optional;
use Nette\PhpGenerator\ClassType;
use Illuminate\Support\Collection;
use Nette\PhpGenerator\PhpNamespace;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\WithTransformer;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class Generator
{
    public const LINE_FEED = "\n";

    private array $standards = [
        'FatturaPA',
        'FACT1',
    ];

    private array $copy_stubs = [
        'FatturaPA' => [
        'src/Models/Stubs/FatturaPA/DatiGeneraliDocumento.php.bak' => 'src/Models/FatturaPA/DatiGeneraliDocumentoType/DatiGeneraliDocumento.php',
        'src/Models/Stubs/FatturaPA/Anagrafica.php.bak' => 'src/Models/FatturaPA/AnagraficaType/Anagrafica.php',
        ],
        'FACT1' => [],
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
        foreach($this->standards as $standard)
        {
        
            $this->standard = $standard;
            $this->child_classes = collect([]);

            $path = "src/Schema/{$this->standard}/{$this->standard}.json";

            $this->document = collect(json_decode(file_get_contents($path),1));

            $this->document->each(function ($node, $key){

                $class_name = str_replace("Type", "", $key);
                $this->writeNette($class_name, $node);

            });

            $this->handleStubbedClasses();
        }
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
            'time' => $type = 'Carbon',
            'dateTime' => $type = 'Carbon',
            'token' => $type = 'string',
            'base64Binary' => $type = 'mixed',
            'normalizedString' => $type = 'string',
            'boolean' => $type = 'bool',
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
                $type = "?{$base_type}";
            } 

            $property = (new Property($element['name']))
                            ->setPublic() 
                            ->setType($type);

            if($base_type == 'float'){
                $property->addAttribute(WithTransformer::class, [FloatTransformer::class]);
            }

            if(in_array($element['base_type'],['dateTime','time']))
            {
                $namespace->addUse(DateTimeInterfaceTransformer::class);
                $namespace->addUse(WithTransformer::class);
                $property->addAttribute(WithTransformer::class, [DateTimeInterfaceTransformer::class, 'format' => 'Y-m-d\TH:i:s.uP']);
            }
            elseif(in_array($element['base_type'], ['date'])) {
                $namespace->addUse(DateTimeInterfaceTransformer::class);
                $namespace->addUse(WithTransformer::class);
                $property->addAttribute(WithTransformer::class, [DateTimeInterfaceTransformer::class, 'format' => 'Y-m-d']);
            }

            if(count($element['resource']) > 0){

                $property->addAttribute(In::class, $element['resource']);

                $class->addProperty($element['name']."_array")
                      ->setPrivate()
                      ->setType('array')
                      ->setValue($element['resource']);
            }


            $class->addMember($property);


        }

        $namespace->add($class);

        $name = str_replace("Type","",$name);
        $this->write($namespace, "{$this->write_path}{$this->standard}/{$name}.php");
        
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

    private function handleStubbedClasses()
    {
        foreach($this->copy_stubs[$this->standard] as $key => $value)
            copy($key, $value);
    }

}


//  private function handleSpecialClasses()
//     {
        
//         $namespace = new PhpNamespace($this->namespace.$this->standard."\\DatiGeneraliDocumentoType");
//         $namespace->addUse(Data::class);
//         $namespace->addUse(Carbon::class);

//         $path = 'src/Models/FatturaPA/DatiGeneraliDocumentoType/DatiGeneraliDocumento.php';
        
//         $f = file_get_contents($path);

//         $class = ClassType::fromCode($f);
//         $class->setExtends(Data::class);

//         $class->removeProperty('Causale');

//         $property = (new Property('Causale'))
//         ->setPublic()
//         ->setType(Type::union('array', Optional::class));

//         $property->addAttribute(StringArrayRule::class);

//         $class->addMember($property);

//         $namespace->add($class);

//         $this->write($namespace,$path);


//         $namespace = new PhpNamespace($this->namespace.$this->standard."\\AnagraficaType");
//         $namespace->addUse(Data::class);
//         $namespace->addUse(Carbon::class);

//         $path = 'src/Models/FatturaPA/Anagrafica.php';

//         $f = file_get_contents($path);

//         $class = ClassType::fromCode($f);
//         $class->setExtends(Data::class);

//         $class->removeProperty('Denominazione');
//         $class->removeProperty('Nome');
//         $class->removeProperty('Cognome');

//         $property = (new Property('Denominazione'))
//         ->setPublic()
//         ->setType(Type::union('string', Optional::class));
//         $property->addAttribute(Max::class, [80]);
//         $property->addAttribute(Min::class, [1]);
//         $property->addAttribute(RequiredWithoutAll::class, ['Cognome','Nome']);
//         $class->addMember($property);

//         $property = (new Property('Cognome'))
//         ->setPublic()
//         ->setType(Type::union('string', Optional::class));
//         $property->addAttribute(Max::class, [80]);
//         $property->addAttribute(Min::class, [1]);
//         $property->addAttribute(RequiredWith::class, ['Nome']);
//         $class->addMember($property);

//         $property = (new Property('Nome'))
//         ->setPublic()
//         ->setType(Type::union('string', Optional::class));
//         $property->addAttribute(Max::class, [80]);
//         $property->addAttribute(Min::class, [1]);
//         $property->addAttribute(RequiredWith::class, ['Cognome']);
//         $class->addMember($property);


//         $namespace->add($class);

//         $this->write($namespace, $path);

        
//     }
