<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Indirizzo extends Data
{
	public string|Optional $NumeroCivico;
	public ?string $CAP;
	public ?string $Comune;
	public string|Optional $Provincia;
	public ?string $Nazione;
}
