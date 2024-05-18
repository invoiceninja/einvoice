<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class FatturaPrincipale extends Data
{
	public ?string $NumeroFatturaPrincipale;
	public Carbon $DataFatturaPrincipale;
}
