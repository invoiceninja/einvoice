<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\AirTransportType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AirTransport extends Data
{
	#[Required]
	public ?string $AircraftID;
}
