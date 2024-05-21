<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomsDeclaration extends Data
{
	#[Required]
	public ?string $ID;
	public IssuerParty|Optional $IssuerParty;
}
