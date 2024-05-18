<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\OrderReferenceType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class OrderReference extends Data
{
	#[Max(200)]
	public ?string $ID;

	#[Max(200)]
	public string|Optional $SalesOrderID;
	public \boolean|Optional $CopyIndicator;
	public string|Optional $UUID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $IssueDate;
	public \time|Optional $IssueTime;
	public string|Optional $CustomerReference;
	public string|Optional $OrderTypeCode;
	public DocumentReference|Optional $DocumentReference;
}
