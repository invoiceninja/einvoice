<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AddressType\ApplicableTerritoryAddress;
use Invoiceninja\Einvoice\Models\Peppol\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\Peppol\DeliveryUnitType\DeliveryUnit;
use Invoiceninja\Einvoice\Models\Peppol\DependentPriceReferenceType\DependentPriceReference;
use Invoiceninja\Einvoice\Models\Peppol\PackageType\Package;
use Invoiceninja\Einvoice\Models\Peppol\PriceType\Price;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\MaximumQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\MinimumQuantity;
use Invoiceninja\Einvoice\Models\Peppol\TaxCategoryType\ApplicableTaxCategory;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
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
