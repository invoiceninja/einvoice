<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransactionConditionsType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TransactionConditions extends Data
{
	public string|Optional $ID;
	public string|Optional $ActionCode;

	/** @param array<Description> $Description */
	public array|Optional $Description;

	/** @param array<DocumentReference> $DocumentReference */
	public array|Optional $DocumentReference;
}
