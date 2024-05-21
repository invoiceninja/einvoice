<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class IdFiscale extends Data
{
	#[Required]
	public string $IdPaese;

	#[Required]
	public string $IdCodice;
}
