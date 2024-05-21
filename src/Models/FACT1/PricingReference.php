<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ItemLocationQuantityType\OriginalItemLocationQuantity;
use Invoiceninja\Einvoice\Models\FACT1\PriceType\AlternativeConditionPrice;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PricingReference extends Data
{
	public OriginalItemLocationQuantity|Optional $OriginalItemLocationQuantity;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PriceType\AlternativeConditionPrice')]
	public AlternativeConditionPrice|Optional $AlternativeConditionPrice;
}
