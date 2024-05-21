<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ItemPropertyRangeType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ItemPropertyRange extends Data
{
	public string|Optional $MinimumValue;
	public string|Optional $MaximumValue;
}
