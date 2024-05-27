<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\AddressType\ApplicableTerritoryAddress;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\DeliveryUnit;
use Invoiceninja\Einvoice\Models\FACT1\DependentPriceReferenceType\DependentPriceReference;
use Invoiceninja\Einvoice\Models\FACT1\PackageType\Package;
use Invoiceninja\Einvoice\Models\FACT1\PriceType\Price;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\MaximumQuantity;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\MinimumQuantity;
use Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\ApplicableTaxCategory;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class ItemLocationQuantity
{
	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:LeadTimeMeasure')]
	public string $LeadTimeMeasure;

	/** @var MinimumQuantity */
	#[SerializedName('cbc:MinimumQuantity')]
	public $MinimumQuantity;

	/** @var MaximumQuantity */
	#[SerializedName('cbc:MaximumQuantity')]
	public $MaximumQuantity;

	/** @var bool */
	#[SerializedName('cbc:HazardousRiskIndicator')]
	public bool $HazardousRiskIndicator;

	/** @var string */
	#[SerializedName('cbc:TradingRestrictions')]
	public string $TradingRestrictions;

	/** @var ApplicableTerritoryAddress[] */
	#[SerializedName('cac:ApplicableTerritoryAddress')]
	public array $ApplicableTerritoryAddress;

	/** @var Price */
	#[SerializedName('cac:Price')]
	public $Price;

	/** @var DeliveryUnit[] */
	#[SerializedName('cac:DeliveryUnit')]
	public array $DeliveryUnit;

	/** @var ApplicableTaxCategory[] */
	#[SerializedName('cac:ApplicableTaxCategory')]
	public array $ApplicableTaxCategory;

	/** @var Package */
	#[SerializedName('cac:Package')]
	public $Package;

	/** @var AllowanceCharge[] */
	#[SerializedName('cac:AllowanceCharge')]
	public array $AllowanceCharge;

	/** @var DependentPriceReference */
	#[SerializedName('cac:DependentPriceReference')]
	public $DependentPriceReference;
}
