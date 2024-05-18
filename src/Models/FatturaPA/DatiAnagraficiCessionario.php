<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiAnagraficiCessionario extends Data
{
	public IdFiscaleIVA|Optional $IdFiscaleIVA;
	public string|Optional $CodiceFiscale;
	public ?Anagrafica $Anagrafica;
}
