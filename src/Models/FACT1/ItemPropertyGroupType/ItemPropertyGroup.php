<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ItemPropertyGroupType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ItemPropertyGroup extends Data
{
	#[Required]
	public ?string $ID;
	public string|Optional $Name;
	public string|Optional $ImportanceCode;
}
