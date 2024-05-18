<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Communication extends Data
{
	public string|Optional $ChannelCode;
	public string|Optional $Channel;
	public string|Optional $Value;
}
