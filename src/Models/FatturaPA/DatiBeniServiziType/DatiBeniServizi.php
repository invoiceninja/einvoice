<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiBeniServiziType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioLineeType\DettaglioLinee;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiBeniServizi extends Data
{
	public ?DettaglioLinee $DettaglioLinee;
	public ?DatiRiepilogo $DatiRiepilogo;
}
