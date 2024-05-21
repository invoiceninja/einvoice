<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SecondaryHazard extends Data
{
	public string|Optional $ID;
	public string|Optional $PlacardNotation;
	public string|Optional $PlacardEndorsement;
	public string|Optional $EmergencyProceduresCode;

	/** @param array<Extension> $Extension */
	public array|Optional $Extension;
}
