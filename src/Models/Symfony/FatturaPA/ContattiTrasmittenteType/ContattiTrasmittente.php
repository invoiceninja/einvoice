<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ContattiTrasmittenteType;

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

class ContattiTrasmittente
{
	/** @var string */
	#[Length(min: 5, max: 12)]
	#[Regex('/[\x{0020}-\x{007E}]{5,12}/u')]
	public string $Telefono;

	/** @var string */
	#[Length(min: 7, max: 256)]
	#[Regex('/.+@.+[.]+.+/')]
	public string $Email;
}
