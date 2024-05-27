<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PackageType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\DeliveryUnit;
use Invoiceninja\Einvoice\Models\FACT1\DespatchType\Despatch;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem;
use Invoiceninja\Einvoice\Models\FACT1\PickupType\Pickup;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\Quantity;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\ContainingTransportEquipment;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class ActualPackage
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
