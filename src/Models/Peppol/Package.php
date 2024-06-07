<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\Peppol\DeliveryUnitType\DeliveryUnit;
use Invoiceninja\Einvoice\Models\Peppol\DespatchType\Despatch;
use Invoiceninja\Einvoice\Models\Peppol\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\Peppol\GoodsItemType\GoodsItem;
use Invoiceninja\Einvoice\Models\Peppol\PackageType\ContainedPackage;
use Invoiceninja\Einvoice\Models\Peppol\PickupType\Pickup;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\Quantity;
use Invoiceninja\Einvoice\Models\Peppol\TransportEquipmentType\ContainingTransportEquipment;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Package
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var Quantity */
    #[SerializedName('cbc:Quantity')]
    public $Quantity;

    /** @var bool */
    #[SerializedName('cbc:ReturnableMaterialIndicator')]
    public bool $ReturnableMaterialIndicator;

    /** @var string */
    #[SerializedName('cbc:PackageLevelCode')]
    public string $PackageLevelCode;

    /** @var string */
    #[SerializedName('cbc:PackagingTypeCode')]
    public string $PackagingTypeCode;

    /** @var string */
    #[SerializedName('cbc:PackingMaterial')]
    public string $PackingMaterial;

    /** @var string */
    #[SerializedName('cbc:TraceID')]
    public string $TraceID;

    /** @var ContainedPackage[] */
    #[SerializedName('cac:ContainedPackage')]
    public array $ContainedPackage;

    /** @var ContainingTransportEquipment */
    #[SerializedName('cac:ContainingTransportEquipment')]
    public $ContainingTransportEquipment;

    /** @var GoodsItem[] */
    #[SerializedName('cac:GoodsItem')]
    public array $GoodsItem;

    /** @var MeasurementDimension[] */
    #[SerializedName('cac:MeasurementDimension')]
    public array $MeasurementDimension;

    /** @var DeliveryUnit[] */
    #[SerializedName('cac:DeliveryUnit')]
    public array $DeliveryUnit;

    /** @var Delivery */
    #[SerializedName('cac:Delivery')]
    public $Delivery;

    /** @var Pickup */
    #[SerializedName('cac:Pickup')]
    public $Pickup;

    /** @var Despatch */
    #[SerializedName('cac:Despatch')]
    public $Despatch;
}
