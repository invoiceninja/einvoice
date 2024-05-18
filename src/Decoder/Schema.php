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

namespace Invoiceninja\Einvoice\Decoder;

class Schema 
{
    private string $path = "src/Schema/";

    public function __invoke(string $standard)
    {
        $data = @file_get_contents("{$this->path}{$standard}/{$standard}.json") ?? false;

        return json_decode($data, false) ?? throw new \Exception("Schema {$standard} not found.");
    }
}