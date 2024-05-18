<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiDDT extends Data
{
	public ?string $NumeroDDT;
	public Carbon $DataDDT;
	public int|Optional $RiferimentoNumeroLinea;
}
