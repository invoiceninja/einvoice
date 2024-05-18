<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiRappresentanteType\DatiAnagrafici;
use Spatie\LaravelData\Data;

class RappresentanteFiscale extends Data
{
	public ?DatiAnagrafici $DatiAnagrafici;
}
