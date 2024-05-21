<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\EmissionCalculationMethodType\EmissionCalculationMethod;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EnvironmentalEmission extends Data
{
	#[Required]
	public ?string $EnvironmentalEmissionTypeCode;

	#[Required]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $ValueMeasure;

	/** @param array<Description> $Description */
	public array|Optional $Description;

	/** @param array<EmissionCalculationMethod> $EmissionCalculationMethod */
	public array|Optional $EmissionCalculationMethod;
}
