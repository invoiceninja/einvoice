<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\AltriDatiGestionaliType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class AltriDatiGestionali extends Data
{
	#[Max(10)]
	#[Min(1)]
	#[Regex('(\p{IsBasicLatin}{1,10})')]
	public string $TipoDato;

	#[Max(60)]
	#[Min(1)]
	#[Regex('[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}')]
	public string|Optional $RiferimentoTesto;

	#[Regex('[\-]?[0-9]{1,11}\.[0-9]{2,8}')]
	public float|Optional $RiferimentoNumero;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $RiferimentoData;
}
