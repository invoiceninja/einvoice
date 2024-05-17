<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiVettoreType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiAnagraficiVettore extends Data
{
	public IdFiscaleIVA $IdFiscaleIVA;

	#[Max(16)]
	#[Min(11)]
	#[Regex('/[A-Z0-9]{11,16}/')]
	public string|Optional $CodiceFiscale;
	public Anagrafica $Anagrafica;

	#[Max(20)]
	#[Min(1)]
	#[Regex('/(\p{Latin}{1,20})/u')]
	public string|Optional $NumeroLicenzaGuida;
}
