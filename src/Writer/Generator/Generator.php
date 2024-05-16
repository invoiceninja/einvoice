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

use DOMDocument;
use Nette\PhpGenerator\Type;
use Spatie\LaravelData\Data;
use Nette\PhpGenerator\Printer;
use Spatie\LaravelData\Optional;
use Nette\PhpGenerator\ClassType;
use Illuminate\Support\Collection;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\Property;

class Generator
{
    public const LINE_FEED = "\n";

    private array $standards = [
        'FACT1',
        'FatturaPA'
    ];

    private Collection $child_classes;

    private Collection $document;

    private string $namespace = "Invoiceninja\Einvoice\Models\\";

    private string $standard = "";

    private string $write_path = "src/Models/";

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

        $this->child_classes->each(function ($child){

            $name = $child['name'];

            //check if subclass! then we need to nest a reference the correct namespace!!

            if(!file_exists("{$this->write_path}/{$this->standard}/{$name}.php"))
                $this->writeNette($child['name'], $this->getChildType($child['base_type']), $child['base_type']);
        
        });

    }

    public function getChildType(string $name)
    {
        return $this->document[$name];
    }

    private function resolveType(string $type): string
    {
        return match($type){
            'integer' => $type = 'int',
            'decimal' => $type = 'float',
            'date' => $type = 'DateTime',
            'dateTime' => $type = 'DateTime',
            'token' => $type = 'string',
            'base64Binary' => $type = 'mixed',
            default => $type = $type,
        };

    }

    public function writeNette(string $name, mixed $type, ?string $subclass = '')
    {
        $name_space_string = $this->namespace.$this->standard;

        if(strlen($subclass) > 2)
            $name_space_string.= "\\".$subclass;

        $namespace = new PhpNamespace($name_space_string);
        $namespace->addUse(Data::class);
        $namespace->addUse(Optional::class);

        $class = new ClassType($name);
        $class->setExtends(Data::class);
        $namespace->add($class);

        foreach($type['elements'] as $key => $element) {

            if($name == $element['name'])
                continue;



$standard_type_path = $element['name'];
// $standard_type_path = $element['base_type']."\\".$element['name'];
// standard_type_path = $this->namespace.$this->standard."\\".$element['base_type']."\\".$element['name'];

            $base_type = stripos($element['base_type'], 'Type') !== false ? $standard_type_path : $this->resolveType($element['base_type']);


            if($base_type == $standard_type_path && strlen($subclass) > 2)
                $namespace->addUse($this->namespace.$this->standard."\\".$element['base_type']."\\".$element['name']);
            elseif($base_type == $standard_type_path )
                $namespace->addUse($this->namespace.$this->standard."\\".$element['name']);

            $type = $element['min_occurs'] == 0 ? Type::union($base_type, Optional::class) : $base_type;

            $class->addProperty($element['name'])
                ->setPublic() // or setVisibility('private')
                ->setType($type);

            if(stripos($element['base_type'], 'Type') !== false)
                $this->child_classes->push(['name' => $element['name'], 'base_type' => $element['base_type']]);

            if(count($element['resource']) > 0){
                // echo $element['name']."_array".PHP_EOL;
                $class->addProperty($element['name']."_array")
                      ->setPublic()
                      ->setType('array')
                      ->setValue($element['resource']);
            }
        }

        $namespace->add($class);

        $printer = new Printer();

        $class_print = "<?php ". self::LINE_FEED . self::LINE_FEED;
        $class_print .= $namespace;
        // $class_print .= $printer->printClass($class); // same as: echo $class
        $file_path = "{$this->write_path}{$this->standard}/";

        if(strlen($subclass) > 1){
            
            $file_path .= "{$subclass}/";
            if(!is_dir($file_path))
                mkdir($file_path);

        }

        $file_path .= "{$name}.php";

        $fp = fopen($file_path, 'w');
        fwrite($fp, $class_print);
        fclose($fp);


    }
}
