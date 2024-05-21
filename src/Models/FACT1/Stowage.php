<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Stowage extends Data
{
	public string|Optional $LocationID;

	/** @param array<Location> $Location */
	public array|Optional $Location;

	/** @param array<MeasurementDimension> $MeasurementDimension */
	public array|Optional $MeasurementDimension;
}
