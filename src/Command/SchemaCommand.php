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

use Invoiceninja\Einvoice\Writer\Generator\Generator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'e:schema',
    description: 'Create Schemas',
    hidden: false,
    aliases: ['e:schema']
)]
final class SchemaCommand extends Command
{
    public $output;

    private array $schemas = [
        'FatturaPA',
        'Fact1',
    ];

    private string $namespace = "\\Invoiceninja\Einvoice\Writer\\";

    protected function configure()
    {
    }

    /**
     * Here all logic happens
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->output = $output;

        $progressBar = new ProgressBar($output, count($this->schemas));
        $this->output->writeln(PHP_EOL);

        foreach($this->schemas as $schema)
        {
            $schema_class = $this->namespace.$schema;

            $this->output->writeln("Building => {$schema}".PHP_EOL);

            $class = new $schema_class();
            $class->init();

            $progressBar->advance();

            $this->output->writeln(PHP_EOL);

        }

        // return value is important when using CI, to fail the build when the command fails

        // in case of fail: "return self::FAILURE;"
        
        $progressBar->finish();
        return self::SUCCESS;
    }

}
