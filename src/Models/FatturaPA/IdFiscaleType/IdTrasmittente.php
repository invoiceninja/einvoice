<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IdTrasmittente extends Data
{
	#[Required]
	#[Max(2)]
	#[Min(2)]
	#[Regex('/[A-Z]{2}/')]
	public ?string $IdPaese;

	#[Required]
	#[Max(28)]
	#[Min(1)]
	public ?string $IdCodice;
}
