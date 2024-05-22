<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class Indirizzo
{
	#[Length(max: 8)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,8}/u')]
	public string $NumeroCivico;

	#[NotNull]
	#[Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $CAP;

	#[NotNull]
	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $Comune;

	#[Length(max: 2)]
	#[Length(min: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $Provincia;

	#[NotNull]
	#[Length(max: 2)]
	#[Length(min: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $Nazione;
}
