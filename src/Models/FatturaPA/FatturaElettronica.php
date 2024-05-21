<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaBodyType\FatturaElettronicaBody;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaHeaderType\FatturaElettronicaHeader;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class FatturaElettronica extends Data
{
	#[Required]
	public FatturaElettronicaHeader $FatturaElettronicaHeader;

	#[Required]
	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaBodyType\FatturaElettronicaBody')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $FatturaElettronicaBody;
}
