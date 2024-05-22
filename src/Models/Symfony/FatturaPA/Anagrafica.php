<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class Anagrafica
{
	#[NotNull]
	#[NotBlank]
	#[Length(max: 80)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string $Denominazione;

	#[NotNull]
	#[NotBlank]
	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $Nome;

	#[NotNull]
	#[NotBlank]
	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $Cognome;

	#[Length(max: 10)]
	#[Length(min: 2)]
	#[Regex('/[\x{0020}-\x{007E}]{2,10}/u')]
	public string $Titolo;

	#[Length(max: 17)]
	#[Length(min: 13)]
	public string $CodEORI;
}
