<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ClauseType;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Clause extends Data
{
	public string|Optional $ID;
	public string|Optional $Content;
}
