<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IdFiscaleIVA extends Data
{
	#[Max(2)]
	#[Min(2)]
	#[Regex('[A-Z]{2}')]
	public string $IdPaese;
	public string $IdCodice;
}
