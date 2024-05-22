<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class CodiceArticolo
{
	#[NotNull]
	#[Length(max: 35)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,35}/u')]
	public string $CodiceTipo;

	#[NotNull]
	#[Length(max: 35)]
	#[Length(min: 1)]
	public string $CodiceValore;
}
