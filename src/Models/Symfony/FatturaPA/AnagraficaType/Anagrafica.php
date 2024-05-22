<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AnagraficaType;

use Carbon\Carbon;

class Anagrafica
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

	#[\Symfony\Component\Validator\Constraints\Length(max: 10)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 2)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{2,10}/u')]
	public string $Titolo;

	#[\Symfony\Component\Validator\Constraints\Length(max: 17)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 13)]
	public string $CodEORI;
}
