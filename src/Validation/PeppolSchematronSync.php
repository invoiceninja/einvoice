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

namespace InvoiceNinja\EInvoice\Validation;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

final class PeppolSchematronSync
{
    public const UPSTREAM_RAW_BASE = 'https://raw.githubusercontent.com/OpenPEPPOL/peppol-bis-invoice-3/master/rules/sch';

    /** @var array<string, array{sch: string, xslt: string}> */
    public const RULE_SETS = [
        'PEPPOL-EN16931-UBL' => [
            'sch' => 'src/Validation/Peppol/PEPPOL-EN16931-UBL.sch',
            'xslt' => 'src/Validation/Peppol/PEPPOL-EN16931-UBL.xslt',
        ],
        'CEN-EN16931-UBL' => [
            'sch' => 'src/Validation/Peppol/CEN-EN16931-UBL.sch',
            'xslt' => 'src/Validation/Peppol/CEN-EN16931-UBL.xslt',
        ],
        'PEPPOL-EN16931-CII' => [
            'sch' => 'src/Validation/Peppol/PEPPOL-EN16931-CII.sch',
            'xslt' => 'src/Validation/Peppol/PEPPOL-EN16931-CII.xslt',
        ],
        'CEN-EN16931-CII' => [
            'sch' => 'src/Validation/Peppol/CEN-EN16931-CII.sch',
            'xslt' => 'src/Validation/Peppol/CEN-EN16931-CII.xslt',
        ],
    ];

    public function __construct(
        private readonly string $packageRoot,
        private string $dockerImage = 'klakegg/saxon:9.8.0-7',
    ) {
    }

    public function setDockerImage(string $dockerImage): self
    {
        $this->dockerImage = $dockerImage;

        return $this;
    }

    /**
     * @param  list<string>  $ruleNames  Keys from RULE_SETS
     * @return list<string>  Human-readable log lines
     */
    public function sync(array $ruleNames, bool $fetchFromUpstream, ?string $localRulesDir): array
    {
        $log = [];

        foreach ($ruleNames as $name) {
            if (! isset(self::RULE_SETS[$name])) {
                throw new \InvalidArgumentException("Unknown Peppol schematron rule set: {$name}");
            }

            $paths = self::RULE_SETS[$name];
            $schPath = $this->absolute($paths['sch']);

            if ($fetchFromUpstream) {
                $source = $this->resolveSchSource($name, $localRulesDir);
                $this->ensureParentDir($schPath);
                copy($source, $schPath);
                $log[] = "Fetched {$name}.sch -> {$paths['sch']}";
            } elseif (! is_file($schPath)) {
                throw new \RuntimeException("Missing schematron file: {$paths['sch']}");
            }

            $xsltPath = $this->absolute($paths['xslt']);
            $this->compileSchToXslt($schPath, $xsltPath);
            $log[] = "Compiled {$name}.xslt -> {$paths['xslt']}";
        }

        return $log;
    }

    private function resolveSchSource(string $ruleName, ?string $localRulesDir): string
    {
        $filename = "{$ruleName}.sch";

        if ($localRulesDir !== null) {
            $local = rtrim($localRulesDir, '/').'/'.$filename;
            if (! is_file($local)) {
                throw new \RuntimeException("Local rules file not found: {$local}");
            }

            return $local;
        }

        $url = self::UPSTREAM_RAW_BASE.'/'.$filename;
        $contents = @file_get_contents($url);
        if ($contents === false) {
            throw new \RuntimeException("Failed to download {$url}");
        }

        $tmp = tempnam(sys_get_temp_dir(), 'peppol-sch-');
        if ($tmp === false) {
            throw new \RuntimeException('Could not create temporary file for downloaded schematron');
        }

        file_put_contents($tmp, $contents);

        return $tmp;
    }

    private function compileSchToXslt(string $schPath, string $xsltPath): void
    {
        if (! $this->commandExists('docker')) {
            throw new \RuntimeException('docker is required to compile schematron (image: '.$this->dockerImage.')');
        }

        $compilerDir = $this->absolute('src/Validation/SchematronCompiler');
        $schDir = dirname($schPath);
        $outDir = dirname($xsltPath);
        $schBase = basename($schPath);
        $xsltBase = basename($xsltPath);

        $this->ensureParentDir($xsltPath);

        $process = new Process([
            'docker', 'run', '--rm',
            '-v', "{$compilerDir}:/compiler:ro",
            '-v', "{$schDir}:/sch:ro",
            '-v', "{$outDir}:/out",
            '--entrypoint', 'java',
            $this->dockerImage,
            '-jar', '/saxon.jar',
            '-xsl:/compiler/iso_svrl_for_xslt2.xsl',
            '-s:/sch/'.$schBase,
            '-o:/out/'.$xsltBase,
        ]);

        $process->setTimeout(600);
        $process->run();

        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        if (! is_file($xsltPath)) {
            throw new \RuntimeException("Compile finished but output missing: {$xsltPath}");
        }
    }

    private function absolute(string $relativePath): string
    {
        return $this->packageRoot.'/'.ltrim($relativePath, '/');
    }

    private function ensureParentDir(string $path): void
    {
        $dir = dirname($path);
        if (! is_dir($dir) && ! mkdir($dir, 0775, true) && ! is_dir($dir)) {
            throw new \RuntimeException("Could not create directory: {$dir}");
        }
    }

    private function commandExists(string $command): bool
    {
        $process = new Process(['which', $command]);
        $process->run();

        return $process->isSuccessful();
    }
}
