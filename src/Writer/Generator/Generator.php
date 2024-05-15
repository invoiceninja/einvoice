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
use Laminas\Code\Generator\TypeGenerator;
use Laminas\Code\Generator\ClassGenerator;
use Laminas\Code\Generator\DocBlockGenerator;
use Laminas\Code\Generator\PropertyGenerator;

class Generator
{
    public const LINE_FEED = "\n";

    private array $standards = [
        'FACT1',
        'FatturaPA'
    ];

    private string $namespace = "Invoiceninja\Einvoice\Models\\";

    private string $standard = "";

    private string $write_path = "src/Models/";

    public function __construct()
    {

    }

    public function build()
    {
        $this->standard = "FatturaPA";
        $path = "src/Schema/{$this->standard}/{$this->standard}.json";

        $document = collect(json_decode(file_get_contents($path),1));

        $document->each(function ($node, $key) use ($document){

            $class_name = str_replace("Type", "", $key);
            $this->writeClass($class_name, $node);

        });

    }

    public function writeClass(string $name, mixed $type)
    {

        // echo print_r($class).PHP_EOL;
        echo $name.PHP_EOL;

        $props = [];

        $class = new ClassGenerator();
        $class->setName($name);
        $class->setExtendedClass('Data');
        $class->setNamespaceName("{$this->namespace}{$this->standard}");
        
        $class->setDocblock(
            (new DocBlockGenerator())
                            ->setShortDescription('Sample generated class')
        );

        foreach($type['elements'] as $key => $element) {
            
            $type = TypeGenerator::fromTypeString($element['name']."|Optional");

            $property = new PropertyGenerator();
            $property->setName($element['name']);
            $property->setVisibility(PropertyGenerator::VISIBILITY_PUBLIC);
            $property->setType($type);
            $property->omitDefaultValue(true);

            $class->addPropertyFromGenerator($property);

        }

        $class_string = "<?php ";
        $class_string .= $class->generate();

        $fp = fopen("{$this->write_path}{$this->standard}/{$name}.php", 'w');
        fwrite($fp, $class_string);
        fclose($fp);

        // echo (new ClassGenerator())
        //     ->setName($class['type'])
        //     ->setExtendedClass('Data')
        //
        //     ->addProperties($props)
        // ->addConstants([
        //         new PropertyGenerator('bat', 'foobarbazbat', PropertyGenerator::FLAG_CONSTANT)
        //     ])
        //     ->generate();
    }
}
