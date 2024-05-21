<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\CommunicationType\OtherCommunication;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Contact extends Data
{
	public string|Optional $ID;
	public string|Optional $Name;
	public string|Optional $Telephone;
	public string|Optional $Telefax;
	public string|Optional $ElectronicMail;

	#[DataCollectionOf('Note')]
	public string|Optional $Note;

	#[DataCollectionOf('OtherCommunication')]
	public OtherCommunication|Optional $OtherCommunication;
}
