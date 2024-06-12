<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\ApplicableTerritoryAddress;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\AllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryUnitType\DeliveryUnit;
use InvoiceNinja\EInvoice\Models\Peppol\DependentPriceReferenceType\DependentPriceReference;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\LeadTimeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\PackageType\Package;
use InvoiceNinja\EInvoice\Models\Peppol\PriceType\Price;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\MaximumQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\MinimumQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\TaxCategoryType\ApplicableTaxCategory;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class ItemLocationQuantity
{
	/** @var LeadTimeMeasure */
	#[SerializedName('cbc:LeadTimeMeasure')]
	public $LeadTimeMeasure;

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
