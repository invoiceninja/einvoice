<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\GoodsItemType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\OriginAddress;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\FreightAllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredCustomsValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredForCarriageValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredStatisticsValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\FreeOnBoardValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\InsuranceValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\ValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CustomsStatusCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\PreferenceCriterionCode;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\Delivery;
use InvoiceNinja\EInvoice\Models\Peppol\DespatchType\Despatch;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\MeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ShipmentDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\GoodsItemContainerType\GoodsItemContainer;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\RequiredCustomsID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\SequenceNumberID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\TraceID;
use InvoiceNinja\EInvoice\Models\Peppol\InvoiceLineType\InvoiceLine;
use InvoiceNinja\EInvoice\Models\Peppol\ItemType\Item;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\ChargeableWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\GrossVolumeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\GrossWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\NetNetWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\NetVolumeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\NetWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\PackageType\ContainingPackage;
use InvoiceNinja\EInvoice\Models\Peppol\PickupType\Pickup;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ChargeableQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\CustomsTariffQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\Quantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ReturnableQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MaximumTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MinimumTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\Temperature;
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

class GoodsItem
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var SequenceNumberID */
	#[SerializedName('cbc:SequenceNumberID')]
	public $SequenceNumberID;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var bool */
	#[SerializedName('cbc:HazardousRiskIndicator')]
	public bool $HazardousRiskIndicator;

	/** @var DeclaredCustomsValueAmount */
	#[SerializedName('cbc:DeclaredCustomsValueAmount')]
	public $DeclaredCustomsValueAmount;

	/** @var DeclaredForCarriageValueAmount */
	#[SerializedName('cbc:DeclaredForCarriageValueAmount')]
	public $DeclaredForCarriageValueAmount;

	/** @var DeclaredStatisticsValueAmount */
	#[SerializedName('cbc:DeclaredStatisticsValueAmount')]
	public $DeclaredStatisticsValueAmount;

	/** @var FreeOnBoardValueAmount */
	#[SerializedName('cbc:FreeOnBoardValueAmount')]
	public $FreeOnBoardValueAmount;

	/** @var InsuranceValueAmount */
	#[SerializedName('cbc:InsuranceValueAmount')]
	public $InsuranceValueAmount;

	/** @var ValueAmount */
	#[SerializedName('cbc:ValueAmount')]
	public $ValueAmount;

	/** @var GrossWeightMeasure */
	#[SerializedName('cbc:GrossWeightMeasure')]
	public $GrossWeightMeasure;

	/** @var NetWeightMeasure */
	#[SerializedName('cbc:NetWeightMeasure')]
	public $NetWeightMeasure;

	/** @var NetNetWeightMeasure */
	#[SerializedName('cbc:NetNetWeightMeasure')]
	public $NetNetWeightMeasure;

	/** @var ChargeableWeightMeasure */
	#[SerializedName('cbc:ChargeableWeightMeasure')]
	public $ChargeableWeightMeasure;

	/** @var GrossVolumeMeasure */
	#[SerializedName('cbc:GrossVolumeMeasure')]
	public $GrossVolumeMeasure;

	/** @var NetVolumeMeasure */
	#[SerializedName('cbc:NetVolumeMeasure')]
	public $NetVolumeMeasure;

	/** @var Quantity */
	#[SerializedName('cbc:Quantity')]
	public $Quantity;

	/** @var PreferenceCriterionCode */
	#[SerializedName('cbc:PreferenceCriterionCode')]
	public $PreferenceCriterionCode;

	/** @var RequiredCustomsID */
	#[SerializedName('cbc:RequiredCustomsID')]
	public $RequiredCustomsID;

	/** @var CustomsStatusCode */
	#[SerializedName('cbc:CustomsStatusCode')]
	public $CustomsStatusCode;

	/** @var CustomsTariffQuantity */
	#[SerializedName('cbc:CustomsTariffQuantity')]
	public $CustomsTariffQuantity;

	/** @var bool */
	#[SerializedName('cbc:CustomsImportClassifiedIndicator')]
	public bool $CustomsImportClassifiedIndicator;

	/** @var ChargeableQuantity */
	#[SerializedName('cbc:ChargeableQuantity')]
	public $ChargeableQuantity;

	/** @var ReturnableQuantity */
	#[SerializedName('cbc:ReturnableQuantity')]
	public $ReturnableQuantity;

	/** @var TraceID */
	#[SerializedName('cbc:TraceID')]
	public $TraceID;

	/** @var Item[] */
	#[SerializedName('cac:Item')]
	public array $Item;

	/** @var GoodsItemContainer[] */
	#[SerializedName('cac:GoodsItemContainer')]
	public array $GoodsItemContainer;

	/** @var FreightAllowanceCharge[] */
	#[SerializedName('cac:FreightAllowanceCharge')]
	public array $FreightAllowanceCharge;

	/** @var InvoiceLine[] */
	#[SerializedName('cac:InvoiceLine')]
	public array $InvoiceLine;

	/** @var Temperature[] */
	#[SerializedName('cac:Temperature')]
	public array $Temperature;

	/** @var ContainedGoodsItem[] */
	#[SerializedName('cac:ContainedGoodsItem')]
	public array $ContainedGoodsItem;

	/** @var OriginAddress */
	#[SerializedName('cac:OriginAddress')]
	public $OriginAddress;

	/** @var Delivery */
	#[SerializedName('cac:Delivery')]
	public $Delivery;

	/** @var Pickup */
	#[SerializedName('cac:Pickup')]
	public $Pickup;

	/** @var Despatch */
	#[SerializedName('cac:Despatch')]
	public $Despatch;

	/** @var MeasurementDimension[] */
	#[SerializedName('cac:MeasurementDimension')]
	public array $MeasurementDimension;

	/** @var ContainingPackage[] */
	#[SerializedName('cac:ContainingPackage')]
	public array $ContainingPackage;

	/** @var ShipmentDocumentReference */
	#[SerializedName('cac:ShipmentDocumentReference')]
	public $ShipmentDocumentReference;

	/** @var MinimumTemperature */
	#[SerializedName('cac:MinimumTemperature')]
	public $MinimumTemperature;

	/** @var MaximumTemperature */
	#[SerializedName('cac:MaximumTemperature')]
	public $MaximumTemperature;
}
