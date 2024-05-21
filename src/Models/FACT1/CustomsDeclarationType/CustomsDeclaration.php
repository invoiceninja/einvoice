<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\CustomsDeclarationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomsDeclaration extends Data
{
	#[Required]
	public string $ID;
	public IssuerParty|Optional $IssuerParty;
}
