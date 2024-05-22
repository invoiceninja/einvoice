<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType;

use Carbon\Carbon;

class IdFiscaleIVA
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Length(max: 2)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 2)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[A-Z]{2}/')]
	public string $IdPaese;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Length(max: 28)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	public string $IdCodice;
}
