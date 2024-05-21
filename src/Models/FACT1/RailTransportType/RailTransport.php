<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\RailTransportType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RailTransport extends Data
{
	#[Required]
	public ?string $TrainID;
	public string|Optional $RailCarID;
}
