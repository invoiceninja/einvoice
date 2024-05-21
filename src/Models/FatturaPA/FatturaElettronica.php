<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaBodyType\FatturaElettronicaBody;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaHeaderType\FatturaElettronicaHeader;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class FatturaElettronica extends Data
{
	#[Required]
	public ?FatturaElettronicaHeader $FatturaElettronicaHeader;

	/** @param array<FatturaElettronicaBody> $FatturaElettronicaBody */
	#[Required]
	public ?array $FatturaElettronicaBody;
}
