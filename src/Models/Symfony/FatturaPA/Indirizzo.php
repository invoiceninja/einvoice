<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class Indirizzo
{
	#[Length(min: 1, max: 8)]
	#[Regex('/[\x{0020}-\x{007E}]{1,8}/u')]
	public string $NumeroCivico;

	#[Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $CAP;

	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $Comune;

	#[Length(min: 2, max: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $Provincia;

	#[Length(min: 2, max: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $Nazione;
}
