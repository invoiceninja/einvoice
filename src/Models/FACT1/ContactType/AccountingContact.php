<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ContactType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\CommunicationType\OtherCommunication;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AccountingContact extends Data
{
	public string|Optional $ID;

	#[Max(100)]
	public string|Optional $Name;

	#[Max(100)]
	public string|Optional $Telephone;
	public string|Optional $Telefax;

	#[Max(100)]
	public string|Optional $ElectronicMail;

	#[DataCollectionOf('string')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $Note;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommunicationType\OtherCommunication')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public OtherCommunication|Optional $OtherCommunication;
}
