<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Spatie\LaravelData\Data;

class RappresentanteFiscaleCessionario extends Data
{
	public ?string $Denominazione;
	public ?string $Nome;
	public ?string $Cognome;
	public ?IdFiscaleIVA $IdFiscaleIVA;
}
