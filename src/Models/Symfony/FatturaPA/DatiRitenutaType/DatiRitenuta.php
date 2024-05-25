<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRitenutaType;

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

class DatiRitenuta
{
	/** @var string */
	#[Choice(['RT01', 'RT02', 'RT03', 'RT04', 'RT05', 'RT06'])]
	public string $TipoRitenuta;
	private array $TipoRitenuta_array = ['RT01', 'RT02', 'RT03', 'RT04', 'RT05', 'RT06'];

	/** @var float|string */
	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $ImportoRitenuta;

	/** @var float|string */
	#[DecimalPrecision(2)]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float|string $AliquotaRitenuta;

	/** @var string */
	#[Choice([
		'A',
		'B',
		'C',
		'D',
		'E',
		'G',
		'H',
		'I',
		'L',
		'M',
		'N',
		'O',
		'P',
		'Q',
		'R',
		'S',
		'T',
		'U',
		'V',
		'W',
		'X',
		'Y',
		'Z',
		'L1',
		'M1',
		'M2',
		'O1',
		'V1',
		'ZO',
	])]
	public string $CausalePagamento;

	private array $CausalePagamento_array = [
		'A',
		'B',
		'C',
		'D',
		'E',
		'G',
		'H',
		'I',
		'L',
		'M',
		'N',
		'O',
		'P',
		'Q',
		'R',
		'S',
		'T',
		'U',
		'V',
		'W',
		'X',
		'Y',
		'Z',
		'L1',
		'M1',
		'M2',
		'O1',
		'V1',
		'ZO',
	];
}
