<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\TerzoIntermediarioSoggettoEmittenteType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiTerzoIntermediarioType\DatiAnagrafici;

class TerzoIntermediarioOSoggettoEmittente
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public DatiAnagrafici $DatiAnagrafici;
}
