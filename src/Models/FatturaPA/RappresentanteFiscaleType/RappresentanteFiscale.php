<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiRappresentanteType\DatiAnagrafici;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RappresentanteFiscale extends Data
{
	#[Required]
	public ?DatiAnagrafici $DatiAnagrafici;
}
