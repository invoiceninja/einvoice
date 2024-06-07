<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\TransportHandlingUnitType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CustomsDeclarationType\CustomsDeclaration;
use InvoiceNinja\EInvoice\Models\Peppol\DespatchLineType\HandlingUnitDespatchLine;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\FloorSpaceMeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\MeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\PalletSpaceMeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ShipmentDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\GoodsItemType\GoodsItem;
use InvoiceNinja\EInvoice\Models\Peppol\HazardousGoodsTransitType\HazardousGoodsTransit;
use InvoiceNinja\EInvoice\Models\Peppol\PackageType\ActualPackage;
use InvoiceNinja\EInvoice\Models\Peppol\PackageType\Package;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalGoodsItemQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalPackageQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\ReceiptLineType\ReceivedHandlingUnitReceiptLine;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\ReferencedShipment;
use InvoiceNinja\EInvoice\Models\Peppol\StatusType\Status;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MaximumTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MinimumTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\TransportEquipment;
use InvoiceNinja\EInvoice\Models\Peppol\TransportMeansType\TransportMeans;
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
