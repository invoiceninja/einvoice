<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class StabileOrganizzazione
{
	/** @var string */
	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,60}/u')]
	public string $Indirizzo;

	/** @var string */
	#[Length(min: 1, max: 8)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,8}/u')]
	public string $NumeroCivico;

	/** @var string */
	#[Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $CAP;

	/** @var string */
	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,60}/u')]
	public string $Comune;

	/** @var string */
	#[Length(min: 2, max: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $Provincia;

	/** @var string */
	#[Length(min: 2, max: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $Nazione;
}
