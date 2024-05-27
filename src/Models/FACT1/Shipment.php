<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\OriginAddress;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\ReturnAddress;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\FreightAllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\DeclaredCustomsValueAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\DeclaredForCarriageValueAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\DeclaredStatisticsValueAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\FreeOnBoardValueAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\InsuranceValueAmount;
use Invoiceninja\Einvoice\Models\FACT1\ConsignmentType\Consignment;
use Invoiceninja\Einvoice\Models\FACT1\CountryType\ExportCountry;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\FirstArrivalPortLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\LastExitPortLocation;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\ConsignmentQuantity;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\TotalGoodsItemQuantity;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\TotalTransportHandlingUnitQuantity;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentStageType\ShipmentStage;
use Invoiceninja\Einvoice\Models\FACT1\TransportHandlingUnitType\TransportHandlingUnit;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Shipment
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:ShippingPriorityLevelCode')]
	public string $ShippingPriorityLevelCode;

	/** @var string */
	#[SerializedName('cbc:HandlingCode')]
	public string $HandlingCode;

	/** @var string */
	#[SerializedName('cbc:HandlingInstructions')]
	public string $HandlingInstructions;

	/** @var string */
	#[SerializedName('cbc:Information')]
	public string $Information;

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
	#[SerializedName('cbc:GrossVolumeMeasure')]
	public string $GrossVolumeMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:NetVolumeMeasure')]
	public string $NetVolumeMeasure;

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
