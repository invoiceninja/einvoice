<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class IdFiscale
{
	#[NotNull]
	#[NotBlank]
	#[Length(max: 2)]
	#[Length(min: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $IdPaese;

	#[NotNull]
	#[NotBlank]
	#[Length(max: 28)]
	#[Length(min: 1)]
	public string $IdCodice;
}
