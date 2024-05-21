<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiRiepilogo extends Data
{
	#[Required]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $AliquotaIVA;

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

	#[\Spatie\LaravelData\Attributes\Validation\In(
		N1: 'Escluse ex. art. 15 del D.P.R. 633/1972',
		N2: 'Non soggette',
		N2.1: 'Non soggette ad IVA ai sensi degli artt. da 7 a 7-septies del DPR 633/72',
		N2.2: 'Non soggette - altri casi',
		N3: 'Non imponibili',
		N3.1: 'Non Imponibili - esportazioni',
		N3.2: 'Non Imponibili - cessioni intracomunitarie',
		N3.3: 'Non Imponibili - cessioni verso San Marino',
		N3.4: 'Non Imponibili - operazioni assimilate alle cessioni all\'esportazione',
		N3.5: 'Non Imponibili - a seguito di dichiarazioni d\'intento',
		N3.6: 'Non Imponibili - altre operazioni che non concorrono alla formazione del plafond',
		N4: 'Esenti',
		N5: 'Regime del margine/IVA non esposta in fattura',
		N6: 'Inversione contabile (per le operazioni in reverse charge ovvero nei casi di autofatturazione per acquisti extra UE di servizi ovvero per importazioni di beni nei soli casi previsti)',
		N6.1: 'Inversione contabile - cessione di rottami e altri materiali di recupero',
		N6.2: 'Inversione contabile - cessione di oro e argento ai sensi della legge 7/2000 nonché di oreficeria usata ad OPO',
		N6.3: 'Inversione contabile - subappalto nel settore edile',
		N6.4: 'Inversione contabile - cessione di fabbricati',
		N6.5: 'Inversione contabile - cessione di telefoni cellulari',
		N6.6: 'Inversione contabile - cessione di prodotti elettronici',
		N6.7: 'Inversione contabile - prestazioni comparto edile e settori connessi',
		N6.8: 'Inversione contabile - operazioni settore energetico',
		N6.9: 'Inversione contabile - altri casi',
		N7: 'IVA assolta in altro stato UE (prestazione di servizi di telecomunicazioni, tele-radiodiffusione ed elettronici ex art. 7-octies lett. a, b, art. 74-sexies DPR 633/72)',
	)]
	public string|Optional $Natura;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $SpeseAccessorie;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Arrotondamento;

	#[Required]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $ImponibileImporto;

	#[Required]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $Imposta;
	private array $EsigibilitaIVA_array = ['D', 'I', 'S'];

	#[\Spatie\LaravelData\Attributes\Validation\In(D: 'esigibilità differita', I: 'esigibilità immediata', S: 'scissione dei pagamenti')]
	public string|Optional $EsigibilitaIVA;
	public string|Optional $RiferimentoNormativo;
}
