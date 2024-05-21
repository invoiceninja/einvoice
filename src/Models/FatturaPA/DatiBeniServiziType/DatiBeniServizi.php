<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiBeniServiziType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioLineeType\DettaglioLinee;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiBeniServizi extends Data
{
	#[Required]
	#[DataCollectionOf('DettaglioLinee')]
	public \Spatie\LaravelData\DataCollection $DettaglioLinee;

	#[Required]
	#[DataCollectionOf('DatiRiepilogo')]
	public \Spatie\LaravelData\DataCollection $DatiRiepilogo;
}
