<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DettaglioLineeType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\AltriDatiGestionaliType\AltriDatiGestionali;
use Invoiceninja\Einvoice\Models\FatturaPA\CodiceArticoloType\CodiceArticolo;
use Invoiceninja\Einvoice\Models\FatturaPA\ScontoMaggiorazioneType\ScontoMaggiorazione;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DettaglioLinee extends Data
{
	#[Required]
	public int $NumeroLinea;
	public string|Optional $TipoCessionePrestazione;
	private array $TipoCessionePrestazione_array = ['SC', 'PR', 'AB', 'AC'];

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\CodiceArticoloType\CodiceArticolo')]
	public CodiceArticolo|Optional $CodiceArticolo;

	#[Required]
	#[Max(1000)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,1000}/u')]
	public string $Descrizione;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[0-9]{1,12}\.[0-9]{2,8}/')]
	public float|Optional $Quantita;

	#[Max(10)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string|Optional $UnitaMisura;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataInizioPeriodo;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataFinePeriodo;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $PrezzoUnitario;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\ScontoMaggiorazioneType\ScontoMaggiorazione')]
	public ScontoMaggiorazione|Optional $ScontoMaggiorazione;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $PrezzoTotale;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $AliquotaIVA;
	public string|Optional $Ritenuta;
	private array $Ritenuta_array = ['SI'];
	public string|Optional $Natura;

	private array $Natura_array = [
		'N1',
		'N2',
		'N2.1',
		'N2.2',
		'N3',
		'N3.1',
		'N3.2',
		'N3.3',
		'N3.4',
		'N3.5',
		'N3.6',
		'N4',
		'N5',
		'N6',
		'N6.1',
		'N6.2',
		'N6.3',
		'N6.4',
		'N6.5',
		'N6.6',
		'N6.7',
		'N6.8',
		'N6.9',
		'N7',
	];

	#[Max(20)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string|Optional $RiferimentoAmministrazione;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\AltriDatiGestionaliType\AltriDatiGestionali')]
	public AltriDatiGestionali|Optional $AltriDatiGestionali;
}
