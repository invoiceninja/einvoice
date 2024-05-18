<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DettaglioLineeType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\AltriDatiGestionaliType\AltriDatiGestionali;
use Invoiceninja\Einvoice\Models\FatturaPA\CodiceArticoloType\CodiceArticolo;
use Invoiceninja\Einvoice\Models\FatturaPA\ScontoMaggiorazioneType\ScontoMaggiorazione;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DettaglioLinee extends Data
{
	public ?int $NumeroLinea;
	public string|Optional $TipoCessionePrestazione;

	private array $TipoCessionePrestazione_array = [
		'SC' => 'Sconto',
		'PR' => 'Premio',
		'AB' => 'Abbuono',
		'AC' => 'Spesa accessoria',
	];

	public CodiceArticolo|Optional $CodiceArticolo;

	#[Max(1000)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,1000}/u')]
	public ?string $Descrizione;

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

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public ?float $PrezzoUnitario;
	public ScontoMaggiorazione|Optional $ScontoMaggiorazione;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public ?float $PrezzoTotale;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public ?float $AliquotaIVA;
	public string|Optional $Ritenuta;
	private array $Ritenuta_array = ['SI' => 'SI = Cessione / Prestazione soggetta a ritenuta'];
	public string|Optional $Natura;

	private array $Natura_array = [
		'N1' => 'Escluse ex. art. 15 del D.P.R. 633/1972',
		'N2' => 'Non soggette',
		'N2.1' => 'Non soggette ad IVA ai sensi degli artt. da 7 a 7-septies del DPR 633/72',
		'N2.2' => 'Non soggette - altri casi',
		'N3' => 'Non imponibili',
		'N3.1' => 'Non Imponibili - esportazioni',
		'N3.2' => 'Non Imponibili - cessioni intracomunitarie',
		'N3.3' => 'Non Imponibili - cessioni verso San Marino',
		'N3.4' => 'Non Imponibili - operazioni assimilate alle cessioni all\'esportazione',
		'N3.5' => 'Non Imponibili - a seguito di dichiarazioni d\'intento',
		'N3.6' => 'Non Imponibili - altre operazioni che non concorrono alla formazione del plafond',
		'N4' => 'Esenti',
		'N5' => 'Regime del margine/IVA non esposta in fattura',
		'N6' => 'Inversione contabile (per le operazioni in reverse charge ovvero nei casi di autofatturazione per acquisti extra UE di servizi ovvero per importazioni di beni nei soli casi previsti)',
		'N6.1' => 'Inversione contabile - cessione di rottami e altri materiali di recupero',
		'N6.2' => 'Inversione contabile - cessione di oro e argento ai sensi della legge 7/2000 nonché di oreficeria usata ad OPO',
		'N6.3' => 'Inversione contabile - subappalto nel settore edile',
		'N6.4' => 'Inversione contabile - cessione di fabbricati',
		'N6.5' => 'Inversione contabile - cessione di telefoni cellulari',
		'N6.6' => 'Inversione contabile - cessione di prodotti elettronici',
		'N6.7' => 'Inversione contabile - prestazioni comparto edile e settori connessi',
		'N6.8' => 'Inversione contabile - operazioni settore energetico',
		'N6.9' => 'Inversione contabile - altri casi',
		'N7' => 'IVA assolta in altro stato UE (prestazione di servizi di telecomunicazioni, tele-radiodiffusione ed elettronici ex art. 7-octies lett. a, b, art. 74-sexies DPR 633/72)',
	];

	#[Max(20)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string|Optional $RiferimentoAmministrazione;
	public AltriDatiGestionali|Optional $AltriDatiGestionali;
}
