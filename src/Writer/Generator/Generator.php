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
            $this->writeNette($child, $this->getChildType($child));
        });

    }

    public function getChildType(string $name)
    {
        return 
        $this->document->first(function ($doc) use($name){
            $x = collect($doc['elements'])->where('name', $name)->first();
            
            return $x;
        });
    }

    private function resolveType(string $type): string
    {
        return match($type){
            'integer' => $type = 'int',
            'decimal' => $type = 'float',
            'date' => $type = 'DateTime',
            'dateTime' => $type = 'DateTime',
            'token' => $type = 'string',
            default => $type = $type,
        };

    }

    public function writeNette(string $name, mixed $type)
    {
        
        $namespace = new PhpNamespace($this->namespace.$this->standard);
        $namespace->addUse(Data::class);
        $namespace->addUse(Optional::class);

        $class = new ClassType($name);
        $class->setExtends(Data::class);
        $namespace->add($class);

        foreach($type['elements'] as $key => $element) {

            if($name == $element['name'])
                continue;

            $base_type = stripos($element['base_type'], 'Type') !== false ? $this->namespace.$this->standard."\\".$element['name'] : $this->resolveType($element['base_type']);
            $type = $element['min_occurs'] == 0 ? Type::union($base_type, Optional::class) : $base_type;

            $class->addProperty($element['name'])
                ->setPublic() // or setVisibility('private')
                ->setType($type);

            if(stripos($element['base_type'], 'Type') !== false)
                $this->child_classes->push($key);
        }

        $namespace->add($class);

        $printer = new Printer();

        $class_print = "<?php ". self::LINE_FEED . self::LINE_FEED;
        $class_print .= $namespace;
        // $class_print .= $printer->printClass($class); // same as: echo $class

        $fp = fopen("{$this->write_path}{$this->standard}/{$name}.php", 'w');
        fwrite($fp, $class_print);
        fclose($fp);


    }
}
