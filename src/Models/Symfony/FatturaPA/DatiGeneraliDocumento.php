<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBolloType\DatiBollo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiCassaPrevidenzialeType\DatiCassaPrevidenziale;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRitenutaType\DatiRitenuta;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ScontoMaggiorazioneType\ScontoMaggiorazione;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiGeneraliDocumento
{
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

	#[Length(min: 3, max: 3)]
	#[Regex('/[A-Z]{3}/')]
	public string $Divisa;

	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public \DateTime $Data;

	#[Length(min: 1, max: 20)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $Numero;

	/** @param DatiRitenuta[] $DatiRitenuta */
	public DatiRitenuta $DatiRitenuta;
	public DatiBollo $DatiBollo;

	/** @param DatiCassaPrevidenziale[] $DatiCassaPrevidenziale */
	public DatiCassaPrevidenziale $DatiCassaPrevidenziale;

	/** @param ScontoMaggiorazione[] $ScontoMaggiorazione */
	public ScontoMaggiorazione $ScontoMaggiorazione;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $ImportoTotaleDocumento;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $Arrotondamento;

	/** @param Causale[] $Causale */
	#[All([new Length(min: 1,max: 200),new Regex(pattern: "/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,200}/u")])]
	public array $Causale;
	private array $Art73_array = ['SI'];
	public string $Art73;
}
