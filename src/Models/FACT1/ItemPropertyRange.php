<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ItemPropertyRange extends Data
{
	public string|Optional $MinimumValue;
	public string|Optional $MaximumValue;
}
