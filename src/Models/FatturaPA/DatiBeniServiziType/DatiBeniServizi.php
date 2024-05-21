<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiBeniServiziType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioLineeType\DettaglioLinee;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiBeniServizi extends Data
{
	/** @param array<DettaglioLinee> $DettaglioLinee */
	#[Required]
	public ?array $DettaglioLinee;

	/** @param array<DatiRiepilogo> $DatiRiepilogo */
	#[Required]
	public ?array $DatiRiepilogo;
}
