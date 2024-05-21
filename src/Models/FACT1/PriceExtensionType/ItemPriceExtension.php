<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PriceExtensionType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\TaxTotal;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ItemPriceExtension extends Data
{
	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $Amount;

	/** @param array<TaxTotal> $TaxTotal */
	public array|Optional $TaxTotal;
}
