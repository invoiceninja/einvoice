<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiRiepilogoType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiRiepilogo extends Data
{
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $AliquotaIVA;
	public string|Optional $Natura;

	public array $Natura_array = [
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

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|Optional $SpeseAccessorie;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float|Optional $Arrotondamento;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImponibileImporto;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $Imposta;

	#[Max(1)]
	#[Min(1)]
	public string|Optional $EsigibilitaIVA;

	public array $EsigibilitaIVA_array = [
		'D' => 'esigibilità differita',
		'I' => 'esigibilità immediata',
		'S' => 'scissione dei pagamenti',
	];

	#[Max(100)]
	#[Min(1)]
	#[Regex('/[\p{Latin}\p{Latin1}]{1,100}/u')]
	public string|Optional $RiferimentoNormativo;
}
