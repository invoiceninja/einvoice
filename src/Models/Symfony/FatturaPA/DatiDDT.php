<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiDDT
{
	#[NotNull]
	#[Length(max: 20)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumeroDDT;

	#[NotNull]
	public Carbon $DataDDT;

	/** @var RiferimentoNumeroLinea[] $RiferimentoNumeroLinea */
	public int $RiferimentoNumeroLinea;
}
