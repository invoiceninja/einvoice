<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class RappresentanteFiscaleCessionario
{
	#[NotNull]
	#[Length(max: 80)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string $Denominazione;

	#[NotNull]
	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $Nome;

	#[NotNull]
	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $Cognome;

	#[NotNull]
	public IdFiscaleIVA $IdFiscaleIVA;
}
