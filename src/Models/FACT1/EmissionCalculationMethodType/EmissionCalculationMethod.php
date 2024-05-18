<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\EmissionCalculationMethodType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\MeasurementFromLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\MeasurementToLocation;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EmissionCalculationMethod extends Data
{
	public string|Optional $CalculationMethodCode;
	public string|Optional $FullnessIndicationCode;
	public MeasurementFromLocation|Optional $MeasurementFromLocation;
	public MeasurementToLocation|Optional $MeasurementToLocation;
}
