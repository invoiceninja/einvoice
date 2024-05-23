<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioLineeType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AltriDatiGestionaliType\AltriDatiGestionali;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CodiceArticoloType\CodiceArticolo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ScontoMaggiorazioneType\ScontoMaggiorazione;

class DettaglioLinee
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public int $NumeroLinea;

	#[\Symfony\Component\Validator\Constraints\Choice('SC', 'PR', 'AB', 'AC')]
	public string $TipoCessionePrestazione;
	private array $TipoCessionePrestazione_array = ['SC', 'PR', 'AB', 'AC'];

	/** @var CodiceArticolo[] $CodiceArticolo */
	public CodiceArticolo $CodiceArticolo;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Length(max: 1000)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,1000}/u')]
	public string $Descrizione;

	#[\Symfony\Component\Validator\Constraints\Regex('/[0-9]{1,12}\.[0-9]{2,8}/')]
	public float $Quantita;

	#[\Symfony\Component\Validator\Constraints\Length(max: 10)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $UnitaMisura;

	#[\Symfony\Component\Validator\Constraints\Date('Y-m-d')]
	public Carbon $DataInizioPeriodo;

	#[\Symfony\Component\Validator\Constraints\Date('Y-m-d')]
	public Carbon $DataFinePeriodo;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $PrezzoUnitario;

	/** @var ScontoMaggiorazione[] $ScontoMaggiorazione */
	public ScontoMaggiorazione $ScontoMaggiorazione;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $PrezzoTotale;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $AliquotaIVA;
	public string $Ritenuta;
	private array $Ritenuta_array = ['SI'];

	#[\Symfony\Component\Validator\Constraints\Choice(
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
	)]
	public string $Natura;

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

	#[\Symfony\Component\Validator\Constraints\Length(max: 20)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $RiferimentoAmministrazione;

	/** @var AltriDatiGestionali[] $AltriDatiGestionali */
	public AltriDatiGestionali $AltriDatiGestionali;
}
