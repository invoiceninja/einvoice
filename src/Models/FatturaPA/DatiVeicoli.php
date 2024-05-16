<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class DatiVeicoli extends Data
{
	public Carbon $Data;
	public string $TotalePercorso;
}
