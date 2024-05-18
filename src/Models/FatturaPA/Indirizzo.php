<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Indirizzo extends Data
{
	public ?string $NumeroCivico;
	public ?string $CAP;
	public ?string $Comune;
	public ?string $Provincia;
	public ?string $Nazione;
}
