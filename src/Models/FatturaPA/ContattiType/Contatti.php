<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\ContattiType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Contatti extends Data
{
	#[Max(12)]
	#[Min(5)]
	#[Regex('(\p{IsBasicLatin}{5,12})')]
	public string|Optional $Telefono;

	#[Max(12)]
	#[Min(5)]
	#[Regex('(\p{IsBasicLatin}{5,12})')]
	public string|Optional $Fax;

	#[Regex('.+@.+[.]+.+')]
	public string|Optional $Email;
}
