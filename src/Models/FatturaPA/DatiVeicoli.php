<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiVeicoli
{
	/** @var \DateTime */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public \DateTime $Data;

	/** @var string */
	#[Length(min: 1, max: 15)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,15}/u')]
	public string $TotalePercorso;
}
