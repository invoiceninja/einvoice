<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class PartyName extends Data
{
	#[Required]
	public string $Name;
}
