<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiTerzoIntermediarioType\DatiAnagrafici;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class TerzoIntermediarioSoggettoEmittente
{
	#[NotNull]
	public DatiAnagrafici $DatiAnagrafici;
}
