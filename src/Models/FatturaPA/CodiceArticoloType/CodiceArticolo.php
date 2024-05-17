<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\CodiceArticoloType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CodiceArticolo extends Data
{
	#[Max(35)]
	#[Min(1)]
	#[Regex('/(\p{Latin}{1,35})/u')]
	public string $CodiceTipo;

	#[Max(35)]
	#[Min(1)]
	public string $CodiceValore;
}
