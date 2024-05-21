<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\AirTransportType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AirTransport extends Data
{
	#[Required]
	public string $AircraftID;
}
