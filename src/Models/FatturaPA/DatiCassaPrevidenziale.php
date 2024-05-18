<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiCassaPrevidenziale extends Data
{
	public ?string $TipoCassa;

	public array $TipoCassa_array = [
		'TC01' => 'Cassa nazionale previdenza e assistenza avvocati e procuratori legali',
		'TC02' => 'Cassa previdenza dottori commercialisti',
		'TC03' => 'Cassa previdenza e assistenza geometri',
		'TC04' => 'Cassa nazionale previdenza e assistenza ingegneri e architetti liberi professionisti',
		'TC05' => 'Cassa nazionale del notariato',
		'TC06' => 'Cassa nazionale previdenza e assistenza ragionieri e periti commerciali',
		'TC07' => 'Ente nazionale assistenza agenti e rappresentanti di commercio (ENASARCO)',
		'TC08' => 'Ente nazionale previdenza e assistenza consulenti del lavoro (ENPACL)',
		'TC09' => 'Ente nazionale previdenza e assistenza medici (ENPAM)',
		'TC10' => 'Ente nazionale previdenza e assistenza farmacisti (ENPAF)',
		'TC11' => 'Ente nazionale previdenza e assistenza veterinari (ENPAV)',
		'TC12' => 'Ente nazionale previdenza e assistenza impiegati dell\'agricoltura (ENPAIA)',
		'TC13' => 'Fondo previdenza impiegati imprese di spedizione e agenzie marittime',
		'TC14' => 'Istituto nazionale previdenza giornalisti italiani (INPGI)',
		'TC15' => 'Opera nazionale assistenza orfani sanitari italiani (ONAOSI)',
		'TC16' => 'Cassa autonoma assistenza integrativa giornalisti italiani (CASAGIT)',
		'TC17' => 'Ente previdenza periti industriali e periti industriali laureati (EPPI)',
		'TC18' => 'Ente previdenza e assistenza pluricategoriale (EPAP)',
		'TC19' => 'Ente nazionale previdenza e assistenza biologi (ENPAB)',
		'TC20' => 'Ente nazionale previdenza e assistenza professione infermieristica (ENPAPI)',
		'TC21' => 'Ente nazionale previdenza e assistenza psicologi (ENPAP)',
		'TC22' => 'INPS',
	];

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $AlCassa;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $ImportoContributoCassa;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $ImponibileCassa;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $AliquotaIVA;
	public ?string $Ritenuta;
	public array $Ritenuta_array = ['SI' => 'SI = Cessione / Prestazione soggetta a ritenuta'];
	public ?string $Natura;

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

	public ?string $RiferimentoAmministrazione;
}
