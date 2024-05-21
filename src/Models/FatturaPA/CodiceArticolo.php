<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class CodiceArticolo extends Data
{
	#[Required]
	public ?string $CodiceTipo;

	#[Required]
	public ?string $CodiceValore;
}
