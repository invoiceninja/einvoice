<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaPrincipaleType;

use Carbon\Carbon;

class FatturaPrincipale
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Length(max: 20)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumeroFatturaPrincipale;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	public Carbon $DataFatturaPrincipale;
}
