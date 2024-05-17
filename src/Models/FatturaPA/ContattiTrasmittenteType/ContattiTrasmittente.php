<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\ContattiTrasmittenteType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ContattiTrasmittente extends Data
{
	#[Max(12)]
	#[Min(5)]
	#[Regex('/(\p{Latin}{5,12})/u')]
	public string|Optional $Telefono;

	#[Max(256)]
	#[Min(7)]
	#[Regex('.+@.+[.]+.+')]
	public string|Optional $Email;
}
