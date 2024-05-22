<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AltriDatiGestionaliType\AltriDatiGestionali;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CodiceArticoloType\CodiceArticolo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ScontoMaggiorazioneType\ScontoMaggiorazione;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DettaglioLinee
{
	#[NotNull]
	public int $NumeroLinea;
	private array $TipoCessionePrestazione_array = ['SC', 'PR', 'AB', 'AC'];
	public string $TipoCessionePrestazione;

	/** @var CodiceArticolo[] $CodiceArticolo */
	public CodiceArticolo $CodiceArticolo;

	#[NotNull]
	#[Length(max: 1000)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,1000}/u')]
	public string $Descrizione;

	#[Regex('/[0-9]{1,12}\.[0-9]{2,8}/')]
	public float $Quantita;

	#[Length(max: 10)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $UnitaMisura;
	public Carbon $DataInizioPeriodo;
	public Carbon $DataFinePeriodo;

	#[NotNull]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $PrezzoUnitario;

	/** @var ScontoMaggiorazione[] $ScontoMaggiorazione */
	public ScontoMaggiorazione $ScontoMaggiorazione;

	#[NotNull]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $PrezzoTotale;

	#[NotNull]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $AliquotaIVA;
	private array $Ritenuta_array = ['SI'];
	public string $Ritenuta;

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

	public string $Natura;

	#[Length(max: 20)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $RiferimentoAmministrazione;

	/** @var AltriDatiGestionali[] $AltriDatiGestionali */
	public AltriDatiGestionali $AltriDatiGestionali;
}
