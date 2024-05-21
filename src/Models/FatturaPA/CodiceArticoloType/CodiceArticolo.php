<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\CodiceArticoloType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CodiceArticolo extends Data
{
	#[Required]
	#[Max(35)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,35}/u')]
	public string $CodiceTipo;

	#[Required]
	#[Max(35)]
	#[Min(1)]
	public string $CodiceValore;
}
