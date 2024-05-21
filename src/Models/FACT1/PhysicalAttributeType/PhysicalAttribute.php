<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PhysicalAttributeType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PhysicalAttribute extends Data
{
	#[Required]
	public string $AttributeID;
	public string|Optional $PositionCode;
	public string|Optional $DescriptionCode;

	/** @param array<Description> $Description */
	public array|Optional $Description;
}
