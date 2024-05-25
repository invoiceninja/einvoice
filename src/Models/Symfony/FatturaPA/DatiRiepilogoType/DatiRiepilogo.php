<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRiepilogoType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiRiepilogo
{
	#[DecimalPrecision(2)]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float|string $AliquotaIVA;

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

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $SpeseAccessorie;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float|string $Arrotondamento;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $ImponibileImporto;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $Imposta;

	/** @var string */
	#[Length(min: 1, max: 1)]
	#[Choice(['D', 'I', 'S'])]
	public string $EsigibilitaIVA;
	private array $EsigibilitaIVA_array = ['D', 'I', 'S'];

	/** @var string */
	#[Length(min: 1, max: 100)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $RiferimentoNormativo;
}
