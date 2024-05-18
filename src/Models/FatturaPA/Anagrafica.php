<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Anagrafica extends Data
{
	public ?string $Denominazione;
	public ?string $Nome;
	public ?string $Cognome;
	public ?string $Titolo;
	public ?string $CodEORI;
}
