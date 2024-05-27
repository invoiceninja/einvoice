<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\CustomsDeclarationType\CustomsDeclaration;
use Invoiceninja\Einvoice\Models\FACT1\DespatchLineType\HandlingUnitDespatchLine;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\FloorSpaceMeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\PalletSpaceMeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ShipmentDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem;
use Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit;
use Invoiceninja\Einvoice\Models\FACT1\PackageType\ActualPackage;
use Invoiceninja\Einvoice\Models\FACT1\PackageType\Package;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\TotalGoodsItemQuantity;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\TotalPackageQuantity;
use Invoiceninja\Einvoice\Models\FACT1\ReceiptLineType\ReceivedHandlingUnitReceiptLine;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\ReferencedShipment;
use Invoiceninja\Einvoice\Models\FACT1\StatusType\Status;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\MaximumTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\MinimumTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\TransportEquipment;
use Invoiceninja\Einvoice\Models\FACT1\TransportMeansType\TransportMeans;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class TransportHandlingUnit
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:TransportHandlingUnitTypeCode')]
	public string $TransportHandlingUnitTypeCode;

	/** @var string */
	#[SerializedName('cbc:HandlingCode')]
	public string $HandlingCode;

	/** @var string */
	#[SerializedName('cbc:HandlingInstructions')]
	public string $HandlingInstructions;

	/** @var bool */
	#[SerializedName('cbc:HazardousRiskIndicator')]
	public bool $HazardousRiskIndicator;

	/** @var TotalGoodsItemQuantity */
	#[SerializedName('cbc:TotalGoodsItemQuantity')]
	public $TotalGoodsItemQuantity;

	/** @var TotalPackageQuantity */
	#[SerializedName('cbc:TotalPackageQuantity')]
	public $TotalPackageQuantity;

	/** @var string */
	#[SerializedName('cbc:DamageRemarks')]
	public string $DamageRemarks;

	/** @var string */
	#[SerializedName('cbc:ShippingMarks')]
	public string $ShippingMarks;

	/** @var string */
	#[SerializedName('cbc:TraceID')]
	public string $TraceID;

	/** @var HandlingUnitDespatchLine[] */
	#[SerializedName('cac:HandlingUnitDespatchLine')]
	public array $HandlingUnitDespatchLine;

	/** @var ActualPackage[] */
	#[SerializedName('cac:ActualPackage')]
	public array $ActualPackage;

	/** @var ReceivedHandlingUnitReceiptLine[] */
	#[SerializedName('cac:ReceivedHandlingUnitReceiptLine')]
	public array $ReceivedHandlingUnitReceiptLine;

	/** @var TransportEquipment[] */
	#[SerializedName('cac:TransportEquipment')]
	public array $TransportEquipment;

	/** @var TransportMeans[] */
	#[SerializedName('cac:TransportMeans')]
	public array $TransportMeans;

	/** @var HazardousGoodsTransit[] */
	#[SerializedName('cac:HazardousGoodsTransit')]
	public array $HazardousGoodsTransit;

	/** @var MeasurementDimension[] */
	#[SerializedName('cac:MeasurementDimension')]
	public array $MeasurementDimension;

	/** @var MinimumTemperature */
	#[SerializedName('cac:MinimumTemperature')]
	public $MinimumTemperature;

	/** @var MaximumTemperature */
	#[SerializedName('cac:MaximumTemperature')]
	public $MaximumTemperature;

	/** @var GoodsItem[] */
	#[SerializedName('cac:GoodsItem')]
	public array $GoodsItem;

	/** @var FloorSpaceMeasurementDimension */
	#[SerializedName('cac:FloorSpaceMeasurementDimension')]
	public $FloorSpaceMeasurementDimension;

	/** @var PalletSpaceMeasurementDimension */
	#[SerializedName('cac:PalletSpaceMeasurementDimension')]
	public $PalletSpaceMeasurementDimension;

	/** @var ShipmentDocumentReference[] */
	#[SerializedName('cac:ShipmentDocumentReference')]
	public array $ShipmentDocumentReference;

	/** @var Status[] */
	#[SerializedName('cac:Status')]
	public array $Status;

	/** @var CustomsDeclaration[] */
	#[SerializedName('cac:CustomsDeclaration')]
	public array $CustomsDeclaration;

	/** @var ReferencedShipment[] */
	#[SerializedName('cac:ReferencedShipment')]
	public array $ReferencedShipment;

	/** @var Package[] */
	#[SerializedName('cac:Package')]
	public array $Package;
}
