<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PhysicalAttribute extends Data
{
	public ?string $AttributeID;
	public string|Optional $PositionCode;
	public string|Optional $DescriptionCode;
	public string|Optional $Description;
}
