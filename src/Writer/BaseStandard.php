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

namespace InvoiceNinja\EInvoice\Writer;

use DOMElement;
use Illuminate\Support\Collection;

class BaseStandard
{
    public \DomDocument $document;

    public array $type_map = [];

    public array $data = [];

    public string $path = "";

    private string $output_directory = "src/Schema/";

    public string $standard = "";

    public string $prefix = "xsd";

    public array $stub_validation = [
            "name" => null,
            "base_type" => null,
            "resource" => [],
            "max_length" => null,
            "min_length" => null,
            "pattern" => null,
            "min_occurs" => null,
            "max_occurs" => null,
    ];

    public function camelToSnake(string $camelCase): string
    {
        $result = '';

        for ($i = 0; $i < strlen($camelCase); $i++) {
            $char = $camelCase[$i];

            if (ctype_upper($char)) {
                $result .= '_' . strtolower($char);
            } else {
                $result .= $char;
            }
        }

        return ltrim($result, '_');
    }

    public function write(): self
    {

        $fp = fopen("src/Schema/{$this->standard}/{$this->standard}.json", 'w');
        fwrite($fp, json_encode((object)$this->data, JSON_PRETTY_PRINT));
        fclose($fp);

        return $this;
    }
}
