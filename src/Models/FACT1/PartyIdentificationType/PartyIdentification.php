<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PartyIdentificationType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PartyIdentification extends Data
{
	#[Required]
	public ?string $ID;
}
