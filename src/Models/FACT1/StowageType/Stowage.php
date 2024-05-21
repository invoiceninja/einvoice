<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\StowageType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class Stowage extends Data
{
	public string|Optional $LocationID;

	#[DataCollectionOf('string')]
	public string|Optional $Location;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension')]
	public MeasurementDimension|Optional $MeasurementDimension;
}
