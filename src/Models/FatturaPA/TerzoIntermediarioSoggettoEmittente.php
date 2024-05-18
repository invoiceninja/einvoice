<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiTerzoIntermediarioType\DatiAnagrafici;
use Spatie\LaravelData\Data;

class TerzoIntermediarioSoggettoEmittente extends Data
{
	public ?DatiAnagrafici $DatiAnagrafici;
}
