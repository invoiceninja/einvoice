<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Indirizzo extends Data
{
	public string|Optional $NumeroCivico;

	#[Required]
	public string $CAP;

	#[Required]
	public string $Comune;
	public string|Optional $Provincia;

	#[Required]
	public string $Nazione;
}
