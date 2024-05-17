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
	#[Regex('/[\p{Basic_Latin}\p{Latin_1_Supplement}]{1,80}/u')]
	public string $Denominazione;

	#[Max(60)]
	#[Min(1)]
	#[Regex('/[\p{Basic_Latin}\p{Latin_1_Supplement}]{1,60}/u')]
	public string $Nome;

	#[Max(60)]
	#[Min(1)]
	#[Regex('/[\p{Basic_Latin}\p{Latin_1_Supplement}]{1,60}/u')]
	public string $Cognome;

	#[Max(10)]
	#[Min(2)]
	#[Regex('/(\p{Basic_Latin}{2,10})/u')]
	public string|Optional $Titolo;

	#[Max(17)]
	#[Min(13)]
	public string|Optional $CodEORI;
}
