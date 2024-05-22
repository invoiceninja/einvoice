<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class AltriDatiGestionali
{
	#[NotNull]
	#[NotBlank]
	#[Length(max: 10)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $TipoDato;

	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $RiferimentoTesto;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $RiferimentoNumero;

	#[Date('Y-m-d')]
	public Carbon $RiferimentoData;
}
