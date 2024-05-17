<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DatiOrdineAcquisto extends Data
{
	public int|Optional $RiferimentoNumeroLinea;

	#[Max(20)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $IdDocumento;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $Data;

	#[Max(20)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string|Optional $NumItem;

	#[Max(100)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string|Optional $CodiceCommessaConvenzione;

	#[Max(15)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public string|Optional $CodiceCUP;

	#[Max(15)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public string|Optional $CodiceCIG;
}
