<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\FreightAllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\ServiceAllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\Delivery;
use InvoiceNinja\EInvoice\Models\Peppol\DespatchType\Despatch;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\MeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ShipmentDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\GoodsItemType\GoodsItem;
use InvoiceNinja\EInvoice\Models\Peppol\HazardousGoodsTransitType\HazardousGoodsTransit;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\LoadingLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\StorageLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\UnloadingLocation;
use InvoiceNinja\EInvoice\Models\Peppol\PackageType\Package;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\LoadingProofParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\OperatingParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\OwnerParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\ProviderParty;
use InvoiceNinja\EInvoice\Models\Peppol\PickupType\Pickup;
use InvoiceNinja\EInvoice\Models\Peppol\ReferencedConsignmentIDType\ReferencedConsignmentID;
use InvoiceNinja\EInvoice\Models\Peppol\SupplierPartyType\SupplierParty;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MaximumTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MinimumTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TraceIDType\TraceID;
use InvoiceNinja\EInvoice\Models\Peppol\TradingTermsType\HaulageTradingTerms;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentSealType\TransportEquipmentSeal;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\DeliveryTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\HandlingTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\LoadingTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PickupTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PositioningTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\QuarantineTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\TransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportHandlingUnitType\PackagedTransportHandlingUnit;
use InvoiceNinja\EInvoice\Models\Peppol\TransportMeansType\ApplicableTransportMeans;
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

class ContainedInTransportEquipment
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var ReferencedConsignmentID[] */
	#[SerializedName('cbc:ReferencedConsignmentID')]
	public array $ReferencedConsignmentID;

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

	/** @var TraceID */
	#[SerializedName('cbc:TraceID')]
	public $TraceID;

	/** @var MeasurementDimension[] */
	#[SerializedName('cac:MeasurementDimension')]
	public array $MeasurementDimension;

	/** @var TransportEquipmentSeal[] */
	#[SerializedName('cac:TransportEquipmentSeal')]
	public array $TransportEquipmentSeal;

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
	public array $PositioningTransportEvent;

	/** @var QuarantineTransportEvent[] */
	#[SerializedName('cac:QuarantineTransportEvent')]
	public array $QuarantineTransportEvent;

	/** @var DeliveryTransportEvent[] */
	#[SerializedName('cac:DeliveryTransportEvent')]
	public array $DeliveryTransportEvent;

	/** @var PickupTransportEvent[] */
	#[SerializedName('cac:PickupTransportEvent')]
	public array $PickupTransportEvent;

	/** @var HandlingTransportEvent[] */
	#[SerializedName('cac:HandlingTransportEvent')]
	public array $HandlingTransportEvent;

	/** @var LoadingTransportEvent[] */
	#[SerializedName('cac:LoadingTransportEvent')]
	public array $LoadingTransportEvent;

	/** @var TransportEvent[] */
	#[SerializedName('cac:TransportEvent')]
	public array $TransportEvent;

	/** @var ApplicableTransportMeans */
	#[SerializedName('cac:ApplicableTransportMeans')]
	public $ApplicableTransportMeans;

	/** @var HaulageTradingTerms[] */
	#[SerializedName('cac:HaulageTradingTerms')]
	public array $HaulageTradingTerms;

	/** @var HazardousGoodsTransit[] */
	#[SerializedName('cac:HazardousGoodsTransit')]
	public array $HazardousGoodsTransit;

	/** @var PackagedTransportHandlingUnit[] */
	#[SerializedName('cac:PackagedTransportHandlingUnit')]
	public array $PackagedTransportHandlingUnit;

	/** @var ServiceAllowanceCharge[] */
	#[SerializedName('cac:ServiceAllowanceCharge')]
	public array $ServiceAllowanceCharge;

	/** @var FreightAllowanceCharge[] */
	#[SerializedName('cac:FreightAllowanceCharge')]
	public array $FreightAllowanceCharge;

	/** @var AttachedTransportEquipment[] */
	#[SerializedName('cac:AttachedTransportEquipment')]
	public array $AttachedTransportEquipment;

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
	public array $ShipmentDocumentReference;

	/** @var Package[] */
	#[SerializedName('cac:Package')]
	public array $Package;

	/** @var GoodsItem[] */
	#[SerializedName('cac:GoodsItem')]
	public array $GoodsItem;
}
