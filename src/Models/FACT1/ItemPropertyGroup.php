<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ItemPropertyGroup extends Data
{
	public ?string $ID;
	public string|Optional $Name;
	public string|Optional $ImportanceCode;
}
