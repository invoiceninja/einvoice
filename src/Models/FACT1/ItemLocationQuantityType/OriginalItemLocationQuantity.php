<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ItemLocationQuantityType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\ApplicableTerritoryAddress;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\DeliveryUnit;
use Invoiceninja\Einvoice\Models\FACT1\DependentPriceReferenceType\DependentPriceReference;
use Invoiceninja\Einvoice\Models\FACT1\PackageType\Package;
use Invoiceninja\Einvoice\Models\FACT1\PriceType\Price;
use Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\ApplicableTaxCategory;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OriginalItemLocationQuantity extends Data
{
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $LeadTimeMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $MinimumQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $MaximumQuantity;
	public bool|Optional $HazardousRiskIndicator;
	public string|Optional $TradingRestrictions;
	public ApplicableTerritoryAddress|Optional $ApplicableTerritoryAddress;
	public Price|Optional $Price;
	public DeliveryUnit|Optional $DeliveryUnit;
	public ApplicableTaxCategory|Optional $ApplicableTaxCategory;
	public Package|Optional $Package;
	public AllowanceCharge|Optional $AllowanceCharge;
	public DependentPriceReference|Optional $DependentPriceReference;
}
