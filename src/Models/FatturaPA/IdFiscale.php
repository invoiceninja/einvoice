<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class IdFiscale
{
	/** @var string */
	#[Length(min: 2, max: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $IdPaese;

	/** @var string */
	#[Length(min: 1, max: 28)]
	public string $IdCodice;
}
