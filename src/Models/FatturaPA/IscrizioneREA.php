<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IscrizioneREA extends Data
{
	public ?string $Ufficio;
	public ?string $NumeroREA;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $CapitaleSociale;
	public ?string $SocioUnico;
	private array $SocioUnico_array = ['SU' => 'socio unico', 'SM' => 'più soci'];
	public ?string $StatoLiquidazione;
	private array $StatoLiquidazione_array = ['LS' => 'in liquidazione', 'LN' => 'non in liquidazione'];
}
