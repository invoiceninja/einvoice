<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiVeicoliType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DatiVeicoli extends Data
{
	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public ?Carbon $Data;

	#[Max(15)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public ?string $TotalePercorso;
}
