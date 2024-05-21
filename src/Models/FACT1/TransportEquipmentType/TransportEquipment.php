<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType;

use Carbon\Carbon;
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
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TransportEquipment extends Data
{
	public string|Optional $ID;

	/** @param array<ReferencedConsignmentID> $ReferencedConsignmentID */
	public array|Optional $ReferencedConsignmentID;
	public string|Optional $TransportEquipmentTypeCode;
	public string|Optional $ProviderTypeCode;
	public string|Optional $OwnerTypeCode;
	public string|Optional $SizeTypeCode;
	public string|Optional $DispositionCode;
	public string|Optional $FullnessIndicationCode;
	public bool|Optional $RefrigerationOnIndicator;

	/** @param array<Information> $Information */
	public array|Optional $Information;
	public bool|Optional $ReturnabilityIndicator;
	public bool|Optional $LegalStatusIndicator;
	public string|Optional $AirFlowPercent;
	public string|Optional $HumidityPercent;
	public bool|Optional $AnimalFoodApprovedIndicator;
	public bool|Optional $HumanFoodApprovedIndicator;
	public bool|Optional $DangerousGoodsApprovedIndicator;
	public bool|Optional $RefrigeratedIndicator;
	public string|Optional $Characteristics;

	/** @param array<DamageRemarks> $DamageRemarks */
	public array|Optional $DamageRemarks;

	/** @param array<Description> $Description */
	public array|Optional $Description;

	/** @param array<SpecialTransportRequirements> $SpecialTransportRequirements */
	public array|Optional $SpecialTransportRequirements;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossWeightMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossVolumeMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TareWeightMeasure;
	public string|Optional $TrackingDeviceCode;
	public bool|Optional $PowerIndicator;
	public string|Optional $TraceID;

	/** @param array<MeasurementDimension> $MeasurementDimension */
	public array|Optional $MeasurementDimension;

	/** @param array<TransportEquipmentSeal> $TransportEquipmentSeal */
	public array|Optional $TransportEquipmentSeal;
	public MinimumTemperature|Optional $MinimumTemperature;
	public MaximumTemperature|Optional $MaximumTemperature;
	public ProviderParty|Optional $ProviderParty;
	public LoadingProofParty|Optional $LoadingProofParty;
	public SupplierParty|Optional $SupplierParty;
	public OwnerParty|Optional $OwnerParty;
	public OperatingParty|Optional $OperatingParty;
	public LoadingLocation|Optional $LoadingLocation;
	public UnloadingLocation|Optional $UnloadingLocation;
	public StorageLocation|Optional $StorageLocation;

	/** @param array<PositioningTransportEvent> $PositioningTransportEvent */
	public array|Optional $PositioningTransportEvent;

	/** @param array<QuarantineTransportEvent> $QuarantineTransportEvent */
	public array|Optional $QuarantineTransportEvent;

	/** @param array<DeliveryTransportEvent> $DeliveryTransportEvent */
	public array|Optional $DeliveryTransportEvent;

	/** @param array<PickupTransportEvent> $PickupTransportEvent */
	public array|Optional $PickupTransportEvent;

	/** @param array<HandlingTransportEvent> $HandlingTransportEvent */
	public array|Optional $HandlingTransportEvent;

	/** @param array<LoadingTransportEvent> $LoadingTransportEvent */
	public array|Optional $LoadingTransportEvent;

	/** @param array<TransportEvent> $TransportEvent */
	public array|Optional $TransportEvent;
	public ApplicableTransportMeans|Optional $ApplicableTransportMeans;

	/** @param array<HaulageTradingTerms> $HaulageTradingTerms */
	public array|Optional $HaulageTradingTerms;

	/** @param array<HazardousGoodsTransit> $HazardousGoodsTransit */
	public array|Optional $HazardousGoodsTransit;

	/** @param array<PackagedTransportHandlingUnit> $PackagedTransportHandlingUnit */
	public array|Optional $PackagedTransportHandlingUnit;

	/** @param array<ServiceAllowanceCharge> $ServiceAllowanceCharge */
	public array|Optional $ServiceAllowanceCharge;

	/** @param array<FreightAllowanceCharge> $FreightAllowanceCharge */
	public array|Optional $FreightAllowanceCharge;

	/** @param array<AttachedTransportEquipment> $AttachedTransportEquipment */
	public array|Optional $AttachedTransportEquipment;
	public Delivery|Optional $Delivery;
	public Pickup|Optional $Pickup;
	public Despatch|Optional $Despatch;

	/** @param array<ShipmentDocumentReference> $ShipmentDocumentReference */
	public array|Optional $ShipmentDocumentReference;

	/** @param array<ContainedInTransportEquipment> $ContainedInTransportEquipment */
	public array|Optional $ContainedInTransportEquipment;

	/** @param array<Package> $Package */
	public array|Optional $Package;

	/** @param array<GoodsItem> $GoodsItem */
	public array|Optional $GoodsItem;
}
