<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\IscrizioneREAType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IscrizioneREA extends Data
{
	#[Required]
	#[Max(2)]
	#[Min(2)]
	#[Regex('/[A-Z]{2}/')]
	public string $Ufficio;

	#[Required]
	#[Max(20)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumeroREA;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|Optional $CapitaleSociale;
	public string|Optional $SocioUnico;
	private array $SocioUnico_array = ['SU' => 'socio unico', 'SM' => 'più soci'];

	#[Required]
	public string $StatoLiquidazione;
	private array $StatoLiquidazione_array = ['LS' => 'in liquidazione', 'LN' => 'non in liquidazione'];
}
