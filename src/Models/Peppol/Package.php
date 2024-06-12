<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\PackageLevelCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\PackagingTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\Delivery;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryUnitType\DeliveryUnit;
use InvoiceNinja\EInvoice\Models\Peppol\DespatchType\Despatch;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\MeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\GoodsItemType\GoodsItem;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\TraceID;
use InvoiceNinja\EInvoice\Models\Peppol\PackageType\ContainedPackage;
use InvoiceNinja\EInvoice\Models\Peppol\PickupType\Pickup;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\Quantity;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\ContainingTransportEquipment;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Package
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var Quantity */
	#[SerializedName('cbc:Quantity')]
	public $Quantity;

	/** @var bool */
	#[SerializedName('cbc:ReturnableMaterialIndicator')]
	public bool $ReturnableMaterialIndicator;

	/** @var PackageLevelCode */
	#[SerializedName('cbc:PackageLevelCode')]
	public $PackageLevelCode;

	/** @var PackagingTypeCode */
	#[SerializedName('cbc:PackagingTypeCode')]
	public $PackagingTypeCode;

	/** @var string */
	#[SerializedName('cbc:PackingMaterial')]
	public string $PackingMaterial;

	/** @var TraceID */
	#[SerializedName('cbc:TraceID')]
	public $TraceID;

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
