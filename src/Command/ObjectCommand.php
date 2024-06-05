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

declare(strict_types=1);

namespace Invoiceninja\Einvoice\Command;

use Invoiceninja\Einvoice\Models\FACT1\Invoice;
use Invoiceninja\Einvoice\Writer\FatturaPA;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Invoiceninja\Einvoice\Writer\Symfony\Generator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronica;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaBody;
use Invoiceninja\Einvoice\Writer\Fact1;
use Invoiceninja\Einvoice\Writer\Peppol;

#[AsCommand(
    name: 'o:create',
    description: 'Create Object Stub',
    hidden: false,
    aliases: ['o:create']
)]


final class ObjectCommand extends Command
{
    public $output;

    private array $standards = [
        'FACT1',
        'FatturaPA',
        'Peppol',
    ];

    protected function configure()
    {


    $this->addOption(
        'standard',
        'i',
        InputOption::VALUE_REQUIRED,
        'Which standard do you want to output?',
        'FatturaPA'
    );

    }

    /**
     * Here all logic happens
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->output = $output;

        $standard = $input->getOption('standard');

        switch ($standard) {
            case 'FatturaPA':        
                $class = new FatturaPA();
                $parent = new FatturaElettronica();
            break;
            case 'FACT1':        
                $class = new Fact1();
                $parent = new Invoice();
            break;
            case 'Peppol':        
                $class = new Peppol();
                $parent = new Invoice();
            break;
            default:
                # code...
                break;
        }

        
        $initializedParent = Serializer::initializeProperties($parent, $class);

        echo Serializer::toJson($initializedParent);

        return self::SUCCESS;
    }

}

class Serializer
{
    public static function initializeProperties($object, $ff)
    {
        $reflectionClass = new \ReflectionClass($object);

        foreach ($reflectionClass->getProperties() as $property) {

            $propertyName = $property->getName();
            $propertyType = $property->getType();

            if (isset($ff->classMap[$propertyName]) ?? false) {
                // If the property is a class, instantiate the class and initialize its properties
                $childClassName = $ff->classMap[$propertyName];
                // echo $childClassName.PHP_EOL;

                if (class_exists($childClassName)) {
                    $childObject = new $ff->classMap[$propertyName]();
                    self::initializeProperties($childObject, $ff);

                    if($propertyType == 'array') {
                        $property->setValue($object, [$childObject]);
                    } else {
                        $property->setValue($object, $childObject);
                    }
                }

            } else {
                // Set a default value for primitive properties
                $defaultValue = self::getDefaultValue($propertyType);
                if($propertyType == 'array') {
                    $property->setValue($object, [$defaultValue]);
                } elseif(!in_array($propertyType, ['DateTime','binary'])) {
                    $property->setValue($object, $defaultValue);
                }
            }
        }

        return $object;
    }

    private static function getDefaultValue($propertyType)
    {
        if ($propertyType) {
            $typeName = $propertyType->getName();
            switch ($typeName) {
                case 'int':
                    return 0;
                case 'float':
                    return 0.0;
                case 'string':
                    return '';
                case 'bool':
                    return false;
                case 'array':
                    return [];
                default:
                    return null;
            }
        }
        return null;
    }

    public static function toJson($object)
    {
        return json_encode($object, JSON_PRETTY_PRINT);
    }
}
