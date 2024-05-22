<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\RappresentanteFiscaleType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiRappresentanteType\DatiAnagrafici;

class RappresentanteFiscale
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public DatiAnagrafici $DatiAnagrafici;
}
