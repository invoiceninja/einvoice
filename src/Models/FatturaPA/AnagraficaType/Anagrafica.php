<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\AnagraficaType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Anagrafica extends Data
{
	#[Max(80)]
	#[Min(1)]
	#[Regex('[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,80}')]
	public string $Denominazione;

	#[Max(60)]
	#[Min(1)]
	#[Regex('[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}')]
	public string $Nome;

	#[Max(60)]
	#[Min(1)]
	#[Regex('[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}')]
	public string $Cognome;

	#[Max(10)]
	#[Min(2)]
	#[Regex('(\p{IsBasicLatin}{2,10})')]
	public string|Optional $Titolo;
	public string|Optional $CodEORI;
}
