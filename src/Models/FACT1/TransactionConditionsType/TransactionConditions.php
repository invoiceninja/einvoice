<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransactionConditionsType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class TransactionConditions extends Data
{
	public string|Optional $ID;
	public string|Optional $ActionCode;

	#[DataCollectionOf('string')]
	public string|Optional $Description;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference')]
	public DocumentReference|Optional $DocumentReference;
}
