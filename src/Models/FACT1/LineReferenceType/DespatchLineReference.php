<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\LineReferenceType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DespatchLineReference extends Data
{
	#[Required]
	public string $LineID;
	public string|Optional $UUID;
	public string|Optional $LineStatusCode;
	public DocumentReference|Optional $DocumentReference;
}
