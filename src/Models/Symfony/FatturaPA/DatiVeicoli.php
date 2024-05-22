<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiVeicoli
{
	#[NotNull]
	#[NotBlank]
	#[Date('Y-m-d')]
	public Carbon $Data;

	#[NotNull]
	#[NotBlank]
	#[Length(max: 15)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public string $TotalePercorso;
}
