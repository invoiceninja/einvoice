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
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
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

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TradingRestrictions;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AddressType\ApplicableTerritoryAddress')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ApplicableTerritoryAddress;
	public Price|Optional $Price;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\DeliveryUnit')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DeliveryUnit;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\ApplicableTaxCategory')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ApplicableTaxCategory;
	public Package|Optional $Package;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $AllowanceCharge;
	public DependentPriceReference|Optional $DependentPriceReference;
}
