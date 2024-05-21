<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioLineeType\DettaglioLinee;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class DatiBeniServizi extends Data
{
	/** @param array<DettaglioLinee> $DettaglioLinee */
	#[Required]
	public ?array $DettaglioLinee;

	/** @param array<DatiRiepilogo> $DatiRiepilogo */
	#[Required]
	public ?array $DatiRiepilogo;
}
