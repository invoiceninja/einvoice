<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiTerzoIntermediarioType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiAnagrafici extends Data
{
	public IdFiscaleIVA|Optional $IdFiscaleIVA;

	#[Max(16)]
	#[Min(11)]
	#[Regex('/[A-Z0-9]{11,16}/')]
	public string|Optional $CodiceFiscale;

	#[Required]
	public ?Anagrafica $Anagrafica;
}
