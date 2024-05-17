<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiCedenteType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DatiAnagrafici extends Data
{
	public IdFiscaleIVA $IdFiscaleIVA;

	#[Max(16)]
	#[Min(11)]
	#[Regex('/[A-Z0-9]{11,16}/')]
	public string|Optional $CodiceFiscale;
	public Anagrafica $Anagrafica;

	#[Max(60)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string|Optional $AlboProfessionale;

	#[Max(2)]
	#[Min(2)]
	#[Regex('/[A-Z]{2}/')]
	public string|Optional $ProvinciaAlbo;

	#[Max(60)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,60}/u')]
	public string|Optional $NumeroIscrizioneAlbo;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataIscrizioneAlbo;
	public string $RegimeFiscale;

	public array $RegimeFiscale_array = [
		'RF01' => ' Regime ordinario',
		'RF02' => 'Regime dei contribuenti minimi (art. 1,c.96-117, L. 244/2007)',
		'RF04' => 'Agricoltura e attività connesse e pesca (artt. 34 e 34-bis, D.P.R. 633/1972)',
		'RF05' => 'Vendita sali e tabacchi (art. 74, c.1, D.P.R. 633/1972)',
		'RF06' => 'Commercio dei fiammiferi (art. 74, c.1, D.P.R. 633/1972)',
		'RF07' => 'Editoria (art. 74, c.1, D.P.R. 633/1972)',
		'RF08' => 'Gestione di servizi di telefonia pubblica (art. 74, c.1, D.P.R. 633/1972)',
		'RF09' => 'Rivendita di documenti di trasporto pubblico e di sosta (art. 74, c.1, D.P.R. 633/1972)',
		'RF10' => "Intrattenimenti, giochi e altre attività\tdi cui alla tariffa allegata al D.P.R. 640/72 (art. 74, c.6, D.P.R. 633/1972)",
		'RF11' => 'Agenzie di viaggi e turismo (art. 74-ter, D.P.R. 633/1972)',
		'RF12' => 'Agriturismo (art. 5, c.2, L. 413/1991)',
		'RF13' => 'Vendite a domicilio (art. 25-bis, c.6, D.P.R. 600/1973)',
		'RF14' => "Rivendita di beni usati, di oggetti\td’arte, d’antiquariato o da collezione (art.\t36, D.L. 41/1995)",
		'RF15' => 'Agenzie di vendite all’asta di oggetti d’arte, antiquariato o da collezione (art. 40-bis, D.L. 41/1995)',
		'RF16' => 'IVA per cassa P.A. (art. 6, c.5, D.P.R. 633/1972)',
		'RF17' => 'IVA per cassa (art. 32-bis, D.L. 83/2012)',
		'RF19' => 'Regime forfettario',
		'RF18' => 'Altro',
	];
}
