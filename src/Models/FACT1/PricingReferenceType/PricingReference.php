<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PricingReferenceType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ItemLocationQuantityType\OriginalItemLocationQuantity;
use Invoiceninja\Einvoice\Models\FACT1\PriceType\AlternativeConditionPrice;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class PricingReference extends Data
{
	public OriginalItemLocationQuantity|Optional $OriginalItemLocationQuantity;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PriceType\AlternativeConditionPrice')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $AlternativeConditionPrice;
}
