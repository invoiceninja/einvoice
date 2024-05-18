<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\AnagraficaType;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class Anagrafica extends Data
{
	public string|\Spatie\LaravelData\Optional $Titolo;
	public string|\Spatie\LaravelData\Optional $CodEORI;

	#[\Spatie\LaravelData\Attributes\Validation\Max(80)]
	#[\Spatie\LaravelData\Attributes\Validation\Min(1)]
	#[\Spatie\LaravelData\Attributes\Validation\RequiredWithoutAll('Cognome', 'Nome')]
	public string|\Spatie\LaravelData\Optional $Denominazione;

	#[\Spatie\LaravelData\Attributes\Validation\Max(80)]
	#[\Spatie\LaravelData\Attributes\Validation\Min(1)]
	#[\Spatie\LaravelData\Attributes\Validation\RequiredWith('Nome')]
	public string|\Spatie\LaravelData\Optional $Cognome;

	#[\Spatie\LaravelData\Attributes\Validation\Max(80)]
	#[\Spatie\LaravelData\Attributes\Validation\Min(1)]
	#[\Spatie\LaravelData\Attributes\Validation\RequiredWith('Cognome')]
	public string|\Spatie\LaravelData\Optional $Nome;
}
