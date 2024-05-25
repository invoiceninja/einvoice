<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiGeneraliDocumentoType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBolloType\DatiBollo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiCassaPrevidenzialeType\DatiCassaPrevidenziale;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRitenutaType\DatiRitenuta;
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

class DatiGeneraliDocumento
{
	/** @var string */
	#[Choice([
		'TD01',
		'TD02',
		'TD03',
		'TD04',
		'TD05',
		'TD06',
		'TD16',
		'TD17',
		'TD18',
		'TD19',
		'TD20',
		'TD21',
		'TD22',
		'TD23',
		'TD24',
		'TD25',
		'TD26',
		'TD27',
		'TD28',
	])]
	public string $TipoDocumento;

	private array $TipoDocumento_array = [
		'TD01',
		'TD02',
		'TD03',
		'TD04',
		'TD05',
		'TD06',
		'TD16',
		'TD17',
		'TD18',
		'TD19',
		'TD20',
		'TD21',
		'TD22',
		'TD23',
		'TD24',
		'TD25',
		'TD26',
		'TD27',
		'TD28',
	];

	/** @var string */
	#[Length(min: 3, max: 3)]
	#[Regex('/[A-Z]{3}/')]
	public string $Divisa;

	/** @var DateTime */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $Data;

	/** @var string */
	#[Length(min: 1, max: 20)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $Numero;

	/** @var DatiRitenuta[] */
	public array $DatiRitenuta = [];

	/** @var DatiBollo */
	public $DatiBollo;

	/** @var DatiCassaPrevidenziale[] */
	public array $DatiCassaPrevidenziale = [];

	/** @var ScontoMaggiorazione[] */
	public array $ScontoMaggiorazione = [];

	/** @var float|string */
	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $ImportoTotaleDocumento;

	/** @var float|string */
	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $Arrotondamento;

	/** @var string[] */
	#[All([new Length(min: 1,max: 200),new Regex(pattern: "/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,200}/u")])]
	public array $Causale = [];

	/** @var string */
	public string $Art73;
	private array $Art73_array = ['SI'];
}
