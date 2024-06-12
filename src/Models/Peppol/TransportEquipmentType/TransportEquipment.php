<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\FreightAllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\ServiceAllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\DispositionCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\FullnessIndicationCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\OwnerTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ProviderTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\SizeTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TrackingDeviceCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TransportEquipmentTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\Delivery;
use InvoiceNinja\EInvoice\Models\Peppol\DespatchType\Despatch;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\MeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ShipmentDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\GoodsItemType\GoodsItem;
use InvoiceNinja\EInvoice\Models\Peppol\HazardousGoodsTransitType\HazardousGoodsTransit;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ReferencedConsignmentID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\TraceID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\LoadingLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\StorageLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\UnloadingLocation;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\GrossVolumeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\GrossWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\TareWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\PackageType\Package;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\LoadingProofParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\OperatingParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\OwnerParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\ProviderParty;
use InvoiceNinja\EInvoice\Models\Peppol\PickupType\Pickup;
use InvoiceNinja\EInvoice\Models\Peppol\SupplierPartyType\SupplierParty;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MaximumTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MinimumTemperature;
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

class TransportEquipment
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var ReferencedConsignmentID[] */
	#[SerializedName('cbc:ReferencedConsignmentID')]
	public array $ReferencedConsignmentID;

	/** @var TransportEquipmentTypeCode */
	#[SerializedName('cbc:TransportEquipmentTypeCode')]
	public $TransportEquipmentTypeCode;

	/** @var ProviderTypeCode */
	#[SerializedName('cbc:ProviderTypeCode')]
	public $ProviderTypeCode;

	/** @var OwnerTypeCode */
	#[SerializedName('cbc:OwnerTypeCode')]
	public $OwnerTypeCode;

	/** @var SizeTypeCode */
	#[SerializedName('cbc:SizeTypeCode')]
	public $SizeTypeCode;

	/** @var DispositionCode */
	#[SerializedName('cbc:DispositionCode')]
	public $DispositionCode;

	/** @var FullnessIndicationCode */
	#[SerializedName('cbc:FullnessIndicationCode')]
	public $FullnessIndicationCode;

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

	/** @var GrossWeightMeasure */
	#[SerializedName('cbc:GrossWeightMeasure')]
	public $GrossWeightMeasure;

	/** @var GrossVolumeMeasure */
	#[SerializedName('cbc:GrossVolumeMeasure')]
	public $GrossVolumeMeasure;

	/** @var TareWeightMeasure */
	#[SerializedName('cbc:TareWeightMeasure')]
	public $TareWeightMeasure;

	/** @var TrackingDeviceCode */
	#[SerializedName('cbc:TrackingDeviceCode')]
	public $TrackingDeviceCode;

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

	/** @var ContainedInTransportEquipment[] */
	#[SerializedName('cac:ContainedInTransportEquipment')]
	public array $ContainedInTransportEquipment;

	/** @var Package[] */
	#[SerializedName('cac:Package')]
	public array $Package;

	/** @var GoodsItem[] */
	#[SerializedName('cac:GoodsItem')]
	public array $GoodsItem;
}
