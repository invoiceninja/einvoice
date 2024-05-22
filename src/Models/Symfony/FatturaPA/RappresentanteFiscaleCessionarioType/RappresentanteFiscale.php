<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\RappresentanteFiscaleCessionarioType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType\IdFiscaleIVA;

class RappresentanteFiscale
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Length(max: 80)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string $Denominazione;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Length(max: 60)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $Nome;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Length(max: 60)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $Cognome;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	public IdFiscaleIVA $IdFiscaleIVA;
}
