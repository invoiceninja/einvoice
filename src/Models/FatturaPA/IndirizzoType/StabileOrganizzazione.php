<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StabileOrganizzazione extends Data
{
	#[Max(60)]
	#[Min(1)]
	#[Regex('[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}')]
	public string $Indirizzo;

	#[Max(8)]
	#[Min(1)]
	#[Regex('(\p{IsBasicLatin}{1,8})')]
	public string|Optional $NumeroCivico;

	#[Regex('[0-9][0-9][0-9][0-9][0-9]')]
	public string $CAP;

	#[Max(60)]
	#[Min(1)]
	#[Regex('[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}')]
	public string $Comune;

	#[Max(2)]
	#[Min(2)]
	#[Regex('[A-Z]{2}')]
	public string|Optional $Provincia;

	#[Max(2)]
	#[Min(2)]
	#[Regex('[A-Z]{2}')]
	public string $Nazione;
}
