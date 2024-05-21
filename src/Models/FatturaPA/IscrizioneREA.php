<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IscrizioneREA extends Data
{
	#[Required]
	public string $Ufficio;

	#[Required]
	public string $NumeroREA;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $CapitaleSociale;
	private array $SocioUnico_array = ['SU', 'SM'];

	#[\Spatie\LaravelData\Attributes\Validation\In(SU: 'socio unico', SM: 'più soci')]
	public string|Optional $SocioUnico;
	private array $StatoLiquidazione_array = ['LS', 'LN'];

	#[Required]
	#[\Spatie\LaravelData\Attributes\Validation\In(LS: 'in liquidazione', LN: 'non in liquidazione')]
	public string $StatoLiquidazione;
}
