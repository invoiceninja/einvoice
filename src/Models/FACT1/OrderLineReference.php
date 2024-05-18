<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\OrderReferenceType\OrderReference;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrderLineReference extends Data
{
	public ?string $LineID;
	public string|Optional $SalesOrderLineID;
	public string|Optional $UUID;
	public string|Optional $LineStatusCode;
	public OrderReference|Optional $OrderReference;
}
