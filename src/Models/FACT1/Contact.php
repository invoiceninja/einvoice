<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\CommunicationType\OtherCommunication;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class Contact extends Data
{
	public string|Optional $ID;
	public string|Optional $Name;
	public string|Optional $Telephone;
	public string|Optional $Telefax;
	public string|Optional $ElectronicMail;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Note;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommunicationType\OtherCommunication')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $OtherCommunication;
}
