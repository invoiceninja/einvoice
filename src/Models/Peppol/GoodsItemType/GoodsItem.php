<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\GoodsItemType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AddressType\OriginAddress;
use Invoiceninja\Einvoice\Models\Peppol\AllowanceChargeType\FreightAllowanceCharge;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\DeclaredCustomsValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\DeclaredForCarriageValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\DeclaredStatisticsValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\FreeOnBoardValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\InsuranceValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\ValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\Peppol\DespatchType\Despatch;
use Invoiceninja\Einvoice\Models\Peppol\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ShipmentDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\GoodsItemContainerType\GoodsItemContainer;
use Invoiceninja\Einvoice\Models\Peppol\InvoiceLineType\InvoiceLine;
use Invoiceninja\Einvoice\Models\Peppol\ItemType\Item;
use Invoiceninja\Einvoice\Models\Peppol\PackageType\ContainingPackage;
use Invoiceninja\Einvoice\Models\Peppol\PickupType\Pickup;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\ChargeableQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\CustomsTariffQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\Quantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\ReturnableQuantity;
use Invoiceninja\Einvoice\Models\Peppol\TemperatureType\MaximumTemperature;
use Invoiceninja\Einvoice\Models\Peppol\TemperatureType\MinimumTemperature;
use Invoiceninja\Einvoice\Models\Peppol\TemperatureType\Temperature;
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
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:SequenceNumberID')]
	public string $SequenceNumberID;

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

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:GrossWeightMeasure')]
	public string $GrossWeightMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:NetWeightMeasure')]
	public string $NetWeightMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:NetNetWeightMeasure')]
	public string $NetNetWeightMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:ChargeableWeightMeasure')]
	public string $ChargeableWeightMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:GrossVolumeMeasure')]
	public string $GrossVolumeMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:NetVolumeMeasure')]
	public string $NetVolumeMeasure;

	/** @var Quantity */
	#[SerializedName('cbc:Quantity')]
	public $Quantity;

	/** @var string */
	#[SerializedName('cbc:PreferenceCriterionCode')]
	public string $PreferenceCriterionCode;

	/** @var string */
	#[SerializedName('cbc:RequiredCustomsID')]
	public string $RequiredCustomsID;

	/** @var string */
	#[SerializedName('cbc:CustomsStatusCode')]
	public string $CustomsStatusCode;

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

	/** @var string */
	#[SerializedName('cbc:TraceID')]
	public string $TraceID;

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
