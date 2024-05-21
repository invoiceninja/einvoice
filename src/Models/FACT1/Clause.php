<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Clause extends Data
{
	public string|Optional $ID;

	#[DataCollectionOf('Content')]
	public string|Optional $Content;
}
