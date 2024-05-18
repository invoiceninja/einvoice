<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Country extends Data
{
	public string|Optional $IdentificationCode;
	public string|Optional $Name;
}
