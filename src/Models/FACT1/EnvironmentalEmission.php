<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\EmissionCalculationMethodType\EmissionCalculationMethod;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EnvironmentalEmission extends Data
{
	#[Required]
	public string $EnvironmentalEmissionTypeCode;

	#[Required]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $ValueMeasure;

	#[DataCollectionOf('string')]
	public string|Optional $Description;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\EmissionCalculationMethodType\EmissionCalculationMethod')]
	public EmissionCalculationMethod|Optional $EmissionCalculationMethod;
}
