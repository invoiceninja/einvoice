<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TransactionConditions extends Data
{
	public string|Optional $ID;
	public string|Optional $ActionCode;
	public string|Optional $Description;
	public DocumentReference|Optional $DocumentReference;
}