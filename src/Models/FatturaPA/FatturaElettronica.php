<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaBodyType\FatturaElettronicaBody;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaHeaderType\FatturaElettronicaHeader;
use Spatie\LaravelData\Data;

class FatturaElettronica extends Data
{
	public FatturaElettronicaHeader $FatturaElettronicaHeader;
	public FatturaElettronicaBody $FatturaElettronicaBody;
}
