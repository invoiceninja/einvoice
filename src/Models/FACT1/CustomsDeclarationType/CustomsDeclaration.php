<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\CustomsDeclarationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomsDeclaration extends Data
{
	public ?string $ID;
	public IssuerParty|Optional $IssuerParty;
}
