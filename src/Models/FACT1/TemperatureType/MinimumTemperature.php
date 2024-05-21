<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TemperatureType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class MinimumTemperature extends Data
{
	#[Required]
	public ?string $AttributeID;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $Measure;

	/** @param array<Description> $Description */
	public array|Optional $Description;
}
