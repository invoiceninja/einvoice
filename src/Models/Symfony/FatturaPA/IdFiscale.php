<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class IdFiscale
{
	#[Length(min: 2, max: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $IdPaese;

	#[Length(min: 1, max: 28)]
	public string $IdCodice;
}
