<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\TerzoIntermediarioSoggettoEmittenteType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiTerzoIntermediarioType\DatiAnagrafici;

class TerzoIntermediarioOSoggettoEmittente
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public DatiAnagrafici $DatiAnagrafici;
}
