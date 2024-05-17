<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiDDTType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DatiDDT extends Data
{
	#[Max(20)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumeroDDT;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon $DataDDT;
	public int|Optional $RiferimentoNumeroLinea;
}
