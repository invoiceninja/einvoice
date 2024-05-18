<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TemperatureType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class MaximumTemperature extends Data
{
	public ?string $AttributeID;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $Measure;
	public string|Optional $Description;
}
