<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiCedenteType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DatiAnagrafici extends Data
{
	#[Required]
	public IdFiscaleIVA $IdFiscaleIVA;

	#[Max(16)]
	#[Min(11)]
	#[Regex('/[A-Z0-9]{11,16}/')]
	public string|Optional $CodiceFiscale;

	#[Required]
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

	#[Required]
	public string $RegimeFiscale;

	private array $RegimeFiscale_array = [
		'RF01',
		'RF02',
		'RF04',
		'RF05',
		'RF06',
		'RF07',
		'RF08',
		'RF09',
		'RF10',
		'RF11',
		'RF12',
		'RF13',
		'RF14',
		'RF15',
		'RF16',
		'RF17',
		'RF19',
		'RF18',
	];
}
