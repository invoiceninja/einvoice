<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\SecondaryHazardType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SecondaryHazard extends Data
{
	public string|Optional $ID;
	public string|Optional $PlacardNotation;
	public string|Optional $PlacardEndorsement;
	public string|Optional $EmergencyProceduresCode;

	#[DataCollectionOf('Extension')]
	public string|Optional $Extension;
}
