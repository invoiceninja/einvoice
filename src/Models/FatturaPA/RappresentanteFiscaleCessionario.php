<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class RappresentanteFiscaleCessionario extends Data
{
	#[Required]
	public ?string $Denominazione;

	#[Required]
	public ?string $Nome;

	#[Required]
	public ?string $Cognome;

	#[Required]
	public ?IdFiscaleIVA $IdFiscaleIVA;
}
