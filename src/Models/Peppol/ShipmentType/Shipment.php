<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ShipmentType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\OriginAddress;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\ReturnAddress;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\FreightAllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredCustomsValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredForCarriageValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredStatisticsValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\FreeOnBoardValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\InsuranceValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\HandlingCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ShippingPriorityLevelCode;
use InvoiceNinja\EInvoice\Models\Peppol\ConsignmentType\Consignment;
use InvoiceNinja\EInvoice\Models\Peppol\CountryType\ExportCountry;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\Delivery;
use InvoiceNinja\EInvoice\Models\Peppol\GoodsItemType\GoodsItem;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\FirstArrivalPortLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\LastExitPortLocation;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\GrossVolumeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\GrossWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\NetNetWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\NetVolumeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\NetWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ConsignmentQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalGoodsItemQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalTransportHandlingUnitQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentStageType\ShipmentStage;
use InvoiceNinja\EInvoice\Models\Peppol\TransportHandlingUnitType\TransportHandlingUnit;
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

class Shipment
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var ShippingPriorityLevelCode */
	#[SerializedName('cbc:ShippingPriorityLevelCode')]
	public $ShippingPriorityLevelCode;

	/** @var HandlingCode */
	#[SerializedName('cbc:HandlingCode')]
	public $HandlingCode;

	/** @var string */
	#[SerializedName('cbc:HandlingInstructions')]
	public string $HandlingInstructions;

	/** @var string */
	#[SerializedName('cbc:Information')]
	public string $Information;

	/** @var GrossWeightMeasure */
	#[SerializedName('cbc:GrossWeightMeasure')]
	public $GrossWeightMeasure;

	/** @var NetWeightMeasure */
	#[SerializedName('cbc:NetWeightMeasure')]
	public $NetWeightMeasure;

	/** @var NetNetWeightMeasure */
	#[SerializedName('cbc:NetNetWeightMeasure')]
	public $NetNetWeightMeasure;

	/** @var GrossVolumeMeasure */
	#[SerializedName('cbc:GrossVolumeMeasure')]
	public $GrossVolumeMeasure;

	/** @var NetVolumeMeasure */
	#[SerializedName('cbc:NetVolumeMeasure')]
	public $NetVolumeMeasure;

	/** @var TotalGoodsItemQuantity */
	#[SerializedName('cbc:TotalGoodsItemQuantity')]
	public $TotalGoodsItemQuantity;

	/** @var TotalTransportHandlingUnitQuantity */
	#[SerializedName('cbc:TotalTransportHandlingUnitQuantity')]
	public $TotalTransportHandlingUnitQuantity;

	/** @var InsuranceValueAmount */
	#[SerializedName('cbc:InsuranceValueAmount')]
	public $InsuranceValueAmount;

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

	/** @var string */
	#[SerializedName('cbc:SpecialInstructions')]
	public string $SpecialInstructions;

	/** @var string */
	#[SerializedName('cbc:DeliveryInstructions')]
	public string $DeliveryInstructions;

	/** @var bool */
	#[SerializedName('cbc:SplitConsignmentIndicator')]
	public bool $SplitConsignmentIndicator;

	/** @var ConsignmentQuantity */
	#[SerializedName('cbc:ConsignmentQuantity')]
	public $ConsignmentQuantity;

	/** @var Consignment[] */
	#[SerializedName('cac:Consignment')]
	public array $Consignment;

	/** @var GoodsItem[] */
	#[SerializedName('cac:GoodsItem')]
	public array $GoodsItem;

	/** @var ShipmentStage[] */
	#[SerializedName('cac:ShipmentStage')]
	public array $ShipmentStage;

	/** @var Delivery */
	#[SerializedName('cac:Delivery')]
	public $Delivery;

	/** @var TransportHandlingUnit[] */
	#[SerializedName('cac:TransportHandlingUnit')]
	public array $TransportHandlingUnit;

	/** @var ReturnAddress */
	#[SerializedName('cac:ReturnAddress')]
	public $ReturnAddress;

	/** @var OriginAddress */
	#[SerializedName('cac:OriginAddress')]
	public $OriginAddress;

	/** @var FirstArrivalPortLocation */
	#[SerializedName('cac:FirstArrivalPortLocation')]
	public $FirstArrivalPortLocation;

	/** @var LastExitPortLocation */
	#[SerializedName('cac:LastExitPortLocation')]
	public $LastExitPortLocation;

	/** @var ExportCountry */
	#[SerializedName('cac:ExportCountry')]
	public $ExportCountry;

	/** @var FreightAllowanceCharge[] */
	#[SerializedName('cac:FreightAllowanceCharge')]
	public array $FreightAllowanceCharge;
}
