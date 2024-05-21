<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\RoadTransportType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RoadTransport extends Data
{
	#[Required]
	public ?string $LicensePlateID;
}
