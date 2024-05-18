<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleCessionarioType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RappresentanteFiscale extends Data
{
	#[Max(80)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public ?string $Denominazione;

	#[Max(60)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public ?string $Nome;

	#[Max(60)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public ?string $Cognome;
	public ?IdFiscaleIVA $IdFiscaleIVA;
}
