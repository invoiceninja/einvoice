<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\RailTransportType;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RailTransport extends Data
{
	public ?string $TrainID;
	public string|Optional $RailCarID;
}
