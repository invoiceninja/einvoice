<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\FreightAllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\ServiceAllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\FACT1\DespatchType\Despatch;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ShipmentDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem;
use Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\LoadingLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\StorageLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\UnloadingLocation;
use Invoiceninja\Einvoice\Models\FACT1\PackageType\Package;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\LoadingProofParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\OperatingParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\OwnerParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\ProviderParty;
use Invoiceninja\Einvoice\Models\FACT1\PickupType\Pickup;
use Invoiceninja\Einvoice\Models\FACT1\SupplierPartyType\SupplierParty;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\MaximumTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\MinimumTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TradingTermsType\HaulageTradingTerms;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentSealType\TransportEquipmentSeal;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\DeliveryTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\HandlingTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\LoadingTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PickupTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PositioningTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\QuarantineTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\TransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportHandlingUnitType\PackagedTransportHandlingUnit;
use Invoiceninja\Einvoice\Models\FACT1\TransportMeansType\ApplicableTransportMeans;
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

class AttachedTransportEquipment
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:ReferencedConsignmentID')]
	public string $ReferencedConsignmentID;

	/** @var string */
	#[SerializedName('cbc:TransportEquipmentTypeCode')]
	public string $TransportEquipmentTypeCode;

	/** @var string */
	#[SerializedName('cbc:ProviderTypeCode')]
	public string $ProviderTypeCode;

	/** @var string */
	#[SerializedName('cbc:OwnerTypeCode')]
	public string $OwnerTypeCode;

	/** @var string */
	#[SerializedName('cbc:SizeTypeCode')]
	public string $SizeTypeCode;

	/** @var string */
	#[SerializedName('cbc:DispositionCode')]
	public string $DispositionCode;

	/** @var string */
	#[SerializedName('cbc:FullnessIndicationCode')]
	public string $FullnessIndicationCode;

	/** @var bool */
	#[SerializedName('cbc:RefrigerationOnIndicator')]
	public bool $RefrigerationOnIndicator;

	/** @var string */
	#[SerializedName('cbc:Information')]
	public string $Information;

	/** @var bool */
	#[SerializedName('cbc:ReturnabilityIndicator')]
	public bool $ReturnabilityIndicator;

	/** @var bool */
	#[SerializedName('cbc:LegalStatusIndicator')]
	public bool $LegalStatusIndicator;

	/** @var string */
	#[SerializedName('cbc:AirFlowPercent')]
	public string $AirFlowPercent;

	/** @var string */
	#[SerializedName('cbc:HumidityPercent')]
	public string $HumidityPercent;

	/** @var bool */
	#[SerializedName('cbc:AnimalFoodApprovedIndicator')]
	public bool $AnimalFoodApprovedIndicator;

	/** @var bool */
	#[SerializedName('cbc:HumanFoodApprovedIndicator')]
	public bool $HumanFoodApprovedIndicator;

	/** @var bool */
	#[SerializedName('cbc:DangerousGoodsApprovedIndicator')]
	public bool $DangerousGoodsApprovedIndicator;

	/** @var bool */
	#[SerializedName('cbc:RefrigeratedIndicator')]
	public bool $RefrigeratedIndicator;

	/** @var string */
	#[SerializedName('cbc:Characteristics')]
	public string $Characteristics;

	/** @var string */
	#[SerializedName('cbc:DamageRemarks')]
	public string $DamageRemarks;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var string */
	#[SerializedName('cbc:SpecialTransportRequirements')]
	public string $SpecialTransportRequirements;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:GrossWeightMeasure')]
	public string $GrossWeightMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:GrossVolumeMeasure')]
	public string $GrossVolumeMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:TareWeightMeasure')]
	public string $TareWeightMeasure;

	/** @var string */
	#[SerializedName('cbc:TrackingDeviceCode')]
	public string $TrackingDeviceCode;

	/** @var bool */
	#[SerializedName('cbc:PowerIndicator')]
	public bool $PowerIndicator;

	/** @var string */
	#[SerializedName('cbc:TraceID')]
	public string $TraceID;

	/** @var MeasurementDimension[] */
	#[SerializedName('cac:MeasurementDimension')]
	public array $MeasurementDimension = [];

	/** @var TransportEquipmentSeal[] */
	#[SerializedName('cac:TransportEquipmentSeal')]
	public array $TransportEquipmentSeal = [];

	/** @var MinimumTemperature */
	#[SerializedName('cac:MinimumTemperature')]
	public $MinimumTemperature;

	/** @var MaximumTemperature */
	#[SerializedName('cac:MaximumTemperature')]
	public $MaximumTemperature;

	/** @var ProviderParty */
	#[SerializedName('cac:ProviderParty')]
	public $ProviderParty;

	/** @var LoadingProofParty */
	#[SerializedName('cac:LoadingProofParty')]
	public $LoadingProofParty;

	/** @var SupplierParty */
	#[SerializedName('cac:SupplierParty')]
	public $SupplierParty;

	/** @var OwnerParty */
	#[SerializedName('cac:OwnerParty')]
	public $OwnerParty;

	/** @var OperatingParty */
	#[SerializedName('cac:OperatingParty')]
	public $OperatingParty;

	/** @var LoadingLocation */
	#[SerializedName('cac:LoadingLocation')]
	public $LoadingLocation;

	/** @var UnloadingLocation */
	#[SerializedName('cac:UnloadingLocation')]
	public $UnloadingLocation;

	/** @var StorageLocation */
	#[SerializedName('cac:StorageLocation')]
	public $StorageLocation;

	/** @var PositioningTransportEvent[] */
	#[SerializedName('cac:PositioningTransportEvent')]
	public array $PositioningTransportEvent = [];

	/** @var QuarantineTransportEvent[] */
	#[SerializedName('cac:QuarantineTransportEvent')]
	public array $QuarantineTransportEvent = [];

	/** @var DeliveryTransportEvent[] */
	#[SerializedName('cac:DeliveryTransportEvent')]
	public array $DeliveryTransportEvent = [];

	/** @var PickupTransportEvent[] */
	#[SerializedName('cac:PickupTransportEvent')]
	public array $PickupTransportEvent = [];

	/** @var HandlingTransportEvent[] */
	#[SerializedName('cac:HandlingTransportEvent')]
	public array $HandlingTransportEvent = [];

	/** @var LoadingTransportEvent[] */
	#[SerializedName('cac:LoadingTransportEvent')]
	public array $LoadingTransportEvent = [];

	/** @var TransportEvent[] */
	#[SerializedName('cac:TransportEvent')]
	public array $TransportEvent = [];

	/** @var ApplicableTransportMeans */
	#[SerializedName('cac:ApplicableTransportMeans')]
	public $ApplicableTransportMeans;

	/** @var HaulageTradingTerms[] */
	#[SerializedName('cac:HaulageTradingTerms')]
	public array $HaulageTradingTerms = [];

	/** @var HazardousGoodsTransit[] */
	#[SerializedName('cac:HazardousGoodsTransit')]
	public array $HazardousGoodsTransit = [];

	/** @var PackagedTransportHandlingUnit[] */
	#[SerializedName('cac:PackagedTransportHandlingUnit')]
	public array $PackagedTransportHandlingUnit = [];

	/** @var ServiceAllowanceCharge[] */
	#[SerializedName('cac:ServiceAllowanceCharge')]
	public array $ServiceAllowanceCharge = [];

	/** @var FreightAllowanceCharge[] */
	#[SerializedName('cac:FreightAllowanceCharge')]
	public array $FreightAllowanceCharge = [];

	/** @var Delivery */
	#[SerializedName('cac:Delivery')]
	public $Delivery;

	/** @var Pickup */
	#[SerializedName('cac:Pickup')]
	public $Pickup;

	/** @var Despatch */
	#[SerializedName('cac:Despatch')]
	public $Despatch;

	/** @var ShipmentDocumentReference[] */
	#[SerializedName('cac:ShipmentDocumentReference')]
	public array $ShipmentDocumentReference = [];

	/** @var ContainedInTransportEquipment[] */
	#[SerializedName('cac:ContainedInTransportEquipment')]
	public array $ContainedInTransportEquipment = [];

	/** @var Package[] */
	#[SerializedName('cac:Package')]
	public array $Package = [];

	/** @var GoodsItem[] */
	#[SerializedName('cac:GoodsItem')]
	public array $GoodsItem = [];
}
