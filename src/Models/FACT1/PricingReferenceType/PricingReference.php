<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PricingReferenceType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ItemLocationQuantityType\OriginalItemLocationQuantity;
use Invoiceninja\Einvoice\Models\FACT1\PriceType\AlternativeConditionPrice;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PricingReference extends Data
{
	public OriginalItemLocationQuantity|Optional $OriginalItemLocationQuantity;
	public AlternativeConditionPrice|Optional $AlternativeConditionPrice;
}
