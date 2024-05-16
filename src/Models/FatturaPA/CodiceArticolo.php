<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class CodiceArticolo extends Data
{
	public string $CodiceTipo;
	public string $CodiceValore;
}
