<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PartyNameType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PartyName extends Data
{
	#[Max(200)]
	public ?string $Name;
}
