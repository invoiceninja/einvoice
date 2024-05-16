<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\IscrizioneREAType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IscrizioneREA extends Data
{
	#[Max(2)]
	#[Min(2)]
	#[Regex('[A-Z]{2}')]
	public string $Ufficio;

	#[Max(20)]
	#[Min(1)]
	#[Regex('(\p{IsBasicLatin}{1,20})')]
	public string $NumeroREA;

	#[Regex('[\-]?[0-9]{1,11}\.[0-9]{2}')]
	public float|Optional $CapitaleSociale;
	public string|Optional $SocioUnico;
	public array $SocioUnico_array = ['SU' => 'socio unico', 'SM' => 'più soci'];
	public string $StatoLiquidazione;
	public array $StatoLiquidazione_array = ['LS' => 'in liquidazione', 'LN' => 'non in liquidazione'];
}
