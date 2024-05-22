<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiVeicoliType;

use Carbon\Carbon;

class DatiVeicoli
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Date('Y-m-d')]
	public Carbon $Data;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Length(max: 15)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public string $TotalePercorso;
}
