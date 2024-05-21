<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\OrderReferenceType\OrderReference;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrderLineReference extends Data
{
	#[Required]
	public string $LineID;
	public string|Optional $SalesOrderLineID;
	public string|Optional $UUID;
	public string|Optional $LineStatusCode;
	public OrderReference|Optional $OrderReference;
}
