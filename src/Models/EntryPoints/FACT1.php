<?php

namespace Invoiceninja\Einvoice\Models\EntryPoints;

use Invoiceninja\Einvoice\Models\FACT1\Invoice;
use Spatie\LaravelData\Data;

class FACT1 extends Data
{
    public ?Invoice $Invoice;
}
