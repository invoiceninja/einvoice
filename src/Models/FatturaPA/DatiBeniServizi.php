<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioLineeType\DettaglioLinee;
use Spatie\LaravelData\Data;

class DatiBeniServizi extends Data
{
	public ?DettaglioLinee $DettaglioLinee;
	public ?DatiRiepilogo $DatiRiepilogo;
}
