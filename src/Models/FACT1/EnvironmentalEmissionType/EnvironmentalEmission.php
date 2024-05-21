<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\EnvironmentalEmissionType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\EmissionCalculationMethodType\EmissionCalculationMethod;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EnvironmentalEmission extends Data
{
	#[Required]
	public string $EnvironmentalEmissionTypeCode;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $ValueMeasure;

	/** @param array<Description> $Description */
	public array|Optional $Description;

	/** @param array<EmissionCalculationMethod> $EmissionCalculationMethod */
	public array|Optional $EmissionCalculationMethod;
}
