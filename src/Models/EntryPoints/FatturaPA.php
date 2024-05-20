<?php

namespace Invoiceninja\Einvoice\Models\EntryPoints;

use Spatie\LaravelData\Data;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronica;

class FatturaPA extends Data
{
    public ?FatturaElettronica $FatturaElettronica;
}
