<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class Contatti
{
	/** @var string */
	#[Length(min: 5, max: 12)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{5,12}/u')]
	public string $Telefono;

	/** @var string */
	#[Length(min: 5, max: 12)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{5,12}/u')]
	public string $Fax;

	/** @var string */
	#[Length(min: 7, max: 256)]
	#[Regex('/.+@.+[.]+.+/')]
	public string $Email;
}
