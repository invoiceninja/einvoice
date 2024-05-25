<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioLineeType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AltriDatiGestionaliType\AltriDatiGestionali;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CodiceArticoloType\CodiceArticolo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ScontoMaggiorazioneType\ScontoMaggiorazione;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DettaglioLinee
{
	/** @var int */
	public int $NumeroLinea;

	/** @var string */
	#[Choice(['SC', 'PR', 'AB', 'AC'])]
	public string $TipoCessionePrestazione;
	private array $TipoCessionePrestazione_array = ['SC', 'PR', 'AB', 'AC'];

	/** @var CodiceArticolo[] */
	public array $CodiceArticolo = [];

	/** @var string */
	#[Length(min: 1, max: 1000)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,1000}/u')]
	public string $Descrizione;

	/** @var string */
	#[DecimalPrecision(2)]
	#[Regex('/[0-9]{1,12}\.[0-9]{2,8}/')]
	public $Quantita;

	/** @var string */
	#[Length(min: 1, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $UnitaMisura;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataInizioPeriodo;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataFinePeriodo;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float|string $PrezzoUnitario;

	/** @var ScontoMaggiorazione[] */
	public array $ScontoMaggiorazione = [];

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float|string $PrezzoTotale;

	#[DecimalPrecision(2)]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public $AliquotaIVA;

	/** @var string */
	public string $Ritenuta;
	private array $Ritenuta_array = ['SI'];

	/** @var string */
	#[Choice([
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
	])]
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

	/** @var string */
	#[Length(min: 1, max: 20)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $RiferimentoAmministrazione;

	/** @var AltriDatiGestionali[] */
	public array $AltriDatiGestionali = [];
}
