<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ContactType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\CommunicationType\OtherCommunication;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DeliveryContact extends Data
{
	public string|Optional $ID;

	#[Max(100)]
	public string|Optional $Name;

	#[Max(100)]
	public string|Optional $Telephone;
	public string|Optional $Telefax;

	#[Max(100)]
	public string|Optional $ElectronicMail;
	public string|Optional $Note;
	public OtherCommunication|Optional $OtherCommunication;
}
