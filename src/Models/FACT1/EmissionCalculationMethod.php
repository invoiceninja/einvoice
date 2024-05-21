<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\MeasurementFromLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\MeasurementToLocation;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EmissionCalculationMethod extends Data
{
	public string|Optional $CalculationMethodCode;
	public string|Optional $FullnessIndicationCode;
	public MeasurementFromLocation|Optional $MeasurementFromLocation;
	public MeasurementToLocation|Optional $MeasurementToLocation;
}
