<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class Anagrafica
{
	#[Length(min: 1, max: 80)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string $Denominazione;

	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $Nome;

	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $Cognome;

	#[Length(min: 2, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}]{2,10}/u')]
	public string $Titolo;

	#[Length(min: 13, max: 17)]
	public string $CodEORI;
}
