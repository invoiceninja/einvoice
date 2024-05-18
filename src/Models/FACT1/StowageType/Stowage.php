<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\StowageType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Stowage extends Data
{
	public string|Optional $LocationID;
	public string|Optional $Location;
	public MeasurementDimension|Optional $MeasurementDimension;
}
