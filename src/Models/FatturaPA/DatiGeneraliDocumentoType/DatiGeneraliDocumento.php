<?php 

class DatiGeneraliDocumento extends Spatie\LaravelData\Data
{
	public string $TipoDocumento;

	public array $TipoDocumento_array = [
		'TD01' => 'Fattura',
		'TD02' => 'Acconto / anticipo su fattura',
		'TD03' => 'Acconto / anticipo su parcella',
		'TD04' => 'Nota di credito',
		'TD05' => 'Nota di debito',
		'TD06' => 'Parcella',
		'TD16' => 'Integrazione fattura reverse charge interno',
		'TD17' => 'Integrazione/autofattura per acquisto servizi dall\'estero',
		'TD18' => 'Integrazione per acquisto di beni intracomunitari',
		'TD19' => 'Integrazione/autofattura per acquisto di beni ex art.17 c.2 DPR 633/72',
		'TD20' => 'Autofattura per regolarizzazione e integrazione delle fatture (ex art.6 c.8 e 9-bis d.lgs.471/97 o art.46 c.5 D.L. 331/93',
		'TD21' => 'Autofattura per splafonamento',
		'TD22' => 'Estrazione benida Deposito IVA',
		'TD23' => 'Estrazione beni da Deposito IVA con versamento dell\'IVA',
		'TD24' => 'Fattura differita di cui all\'art.21, comma 4, terzo periodo lett. a) DPR 633/72',
		'TD25' => 'Fattura differita di cui all\'art.21, comma 4, terzo periodo lett. b) DPR 633/72',
		'TD26' => 'Cessione di beni ammortizzabili e per passaggi interni (ex art.36 DPR 633/72)',
		'TD27' => 'Fattura per autoconsumo o per cessioni gratuite senza rivalsa',
		'TD28' => 'Acquisti da San Marino con IVA (fattura cartacea)',
	];

	#[Spatie\LaravelData\Attributes\Validation\Max(3)]
	#[Spatie\LaravelData\Attributes\Validation\Min(3)]
	#[Spatie\LaravelData\Attributes\Validation\Regex('/[A-Z]{3}/')]
	public string $Divisa;

	#[Spatie\LaravelData\Attributes\WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public \Carbon\Carbon $Data;

	#[Spatie\LaravelData\Attributes\Validation\Max(20)]
	#[Spatie\LaravelData\Attributes\Validation\Min(1)]
	#[Spatie\LaravelData\Attributes\Validation\Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $Numero;
	public \Invoiceninja\Einvoice\Models\FatturaPA\DatiRitenutaType\DatiRitenuta|\Spatie\LaravelData\Optional $DatiRitenuta;
	public \Invoiceninja\Einvoice\Models\FatturaPA\DatiBolloType\DatiBollo|\Spatie\LaravelData\Optional $DatiBollo;
	public \Invoiceninja\Einvoice\Models\FatturaPA\DatiCassaPrevidenzialeType\DatiCassaPrevidenziale|\Spatie\LaravelData\Optional $DatiCassaPrevidenziale;
	public \Invoiceninja\Einvoice\Models\FatturaPA\ScontoMaggiorazioneType\ScontoMaggiorazione|\Spatie\LaravelData\Optional $ScontoMaggiorazione;

	#[Spatie\LaravelData\Attributes\Validation\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|\Spatie\LaravelData\Optional $ImportoTotaleDocumento;

	#[Spatie\LaravelData\Attributes\Validation\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|\Spatie\LaravelData\Optional $Arrotondamento;
	public string|\Spatie\LaravelData\Optional $Art73;

	public array $Art73_array = [
		'SI' => 'SI = Documento emesso secondo modalità e termini stabiliti con DM ai sensi dell\'art. 73 DPR 633/72',
	];

	#[Invoiceninja\Einvoice\Models\Rules\StringArrayRule]
	public array|Spatie\LaravelData\Optional $Causale;
}
