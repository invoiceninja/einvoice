<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrderReference extends Data
{
	public ?string $ID;
	public string|Optional $SalesOrderID;
	public \boolean|Optional $CopyIndicator;
	public string|Optional $UUID;
	public Carbon|Optional $IssueDate;
	public \time|Optional $IssueTime;
	public string|Optional $CustomerReference;
	public string|Optional $OrderTypeCode;
	public DocumentReference|Optional $DocumentReference;
}
