<?php

/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2026. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

declare(strict_types=1);

namespace InvoiceNinja\EInvoice\Command;

use InvoiceNinja\EInvoice\Validation\PeppolSchematronSync;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'e:peppol-schematron',
    description: 'Download OpenPEPPOL .sch rules, compile to .xslt, and update package stylesheets',
    aliases: ['peppol:schematron-sync'],
)]
final class PeppolSchematronSyncCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addOption(
                'rules',
                null,
                InputOption::VALUE_REQUIRED,
                'Comma-separated rule sets (default: CEN + PEPPOL UBL). Available: '.implode(', ', array_keys(PeppolSchematronSync::RULE_SETS)),
                'CEN-EN16931-UBL,PEPPOL-EN16931-UBL',
            )
            ->addOption(
                'peppol-only',
                null,
                InputOption::VALUE_NONE,
                'Only sync PEPPOL-EN16931-UBL (skip CEN)',
            )
            ->addOption(
                'all',
                null,
                InputOption::VALUE_NONE,
                'Sync all UBL/CII schematron rule sets under src/Validation/Peppol/',
            )
            ->addOption(
                'no-fetch',
                null,
                InputOption::VALUE_NONE,
                'Skip downloading .sch files; compile from existing src/Validation/Peppol/*.sch',
            )
            ->addOption(
                'local-rules-dir',
                null,
                InputOption::VALUE_REQUIRED,
                'Use .sch files from a local peppol-bis-invoice-3 clone (e.g. .../rules/sch) instead of GitHub',
            )
            ->addOption(
                'docker-image',
                null,
                InputOption::VALUE_REQUIRED,
                'Saxon Docker image for compilation',
                'klakegg/saxon:9.8.0-7',
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $packageRoot = dirname(__DIR__, 2);

        if ($input->getOption('all')) {
            $ruleNames = array_keys(PeppolSchematronSync::RULE_SETS);
        } elseif ($input->getOption('peppol-only')) {
            $ruleNames = ['PEPPOL-EN16931-UBL'];
        } else {
            $ruleNames = array_values(array_filter(array_map(
                static fn (string $name): string => trim($name),
                explode(',', (string) $input->getOption('rules')),
            )));
        }

        if ($ruleNames === []) {
            $output->writeln('<error>No rule sets selected.</error>');

            return Command::FAILURE;
        }

        $sync = new PeppolSchematronSync($packageRoot);
        $sync->setDockerImage((string) $input->getOption('docker-image'));

        try {
            $lines = $sync->sync(
                $ruleNames,
                ! $input->getOption('no-fetch'),
                $input->getOption('local-rules-dir'),
            );
        } catch (\Throwable $e) {
            $output->writeln('<error>'.$e->getMessage().'</error>');

            return Command::FAILURE;
        }

        foreach ($lines as $line) {
            $output->writeln('<info>'.$line.'</info>');
        }

        $output->writeln('');
        $output->writeln('Done. Stylesheets use the ISO Schematron skeleton (Saxon-PHP compatible).');
        $output->writeln('Prerequisite: docker pull '.$input->getOption('docker-image'));

        return Command::SUCCESS;
    }
}
