<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ServiceFrequencyType;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ScheduledServiceFrequency extends Data
{
	public ?string $WeekDayCode;
}
