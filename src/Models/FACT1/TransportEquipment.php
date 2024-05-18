<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

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
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\AttachedTransportEquipment;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\ContainedInTransportEquipment;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\DeliveryTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\HandlingTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\LoadingTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PickupTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PositioningTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\QuarantineTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\TransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportHandlingUnitType\PackagedTransportHandlingUnit;
use Invoiceninja\Einvoice\Models\FACT1\TransportMeansType\ApplicableTransportMeans;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TransportEquipment extends Data
{
	public string|Optional $ID;
	public string|Optional $ReferencedConsignmentID;
	public string|Optional $TransportEquipmentTypeCode;
	public string|Optional $ProviderTypeCode;
	public string|Optional $OwnerTypeCode;
	public string|Optional $SizeTypeCode;
	public string|Optional $DispositionCode;
	public string|Optional $FullnessIndicationCode;
	public \boolean|Optional $RefrigerationOnIndicator;
	public string|Optional $Information;
	public \boolean|Optional $ReturnabilityIndicator;
	public \boolean|Optional $LegalStatusIndicator;
	public string|Optional $AirFlowPercent;
	public string|Optional $HumidityPercent;
	public \boolean|Optional $AnimalFoodApprovedIndicator;
	public \boolean|Optional $HumanFoodApprovedIndicator;
	public \boolean|Optional $DangerousGoodsApprovedIndicator;
	public \boolean|Optional $RefrigeratedIndicator;
	public string|Optional $Characteristics;
	public string|Optional $DamageRemarks;
	public string|Optional $Description;
	public string|Optional $SpecialTransportRequirements;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossWeightMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossVolumeMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TareWeightMeasure;
	public string|Optional $TrackingDeviceCode;
	public \boolean|Optional $PowerIndicator;
	public string|Optional $TraceID;
	public MeasurementDimension|Optional $MeasurementDimension;
	public TransportEquipmentSeal|Optional $TransportEquipmentSeal;
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
	public PositioningTransportEvent|Optional $PositioningTransportEvent;
	public QuarantineTransportEvent|Optional $QuarantineTransportEvent;
	public DeliveryTransportEvent|Optional $DeliveryTransportEvent;
	public PickupTransportEvent|Optional $PickupTransportEvent;
	public HandlingTransportEvent|Optional $HandlingTransportEvent;
	public LoadingTransportEvent|Optional $LoadingTransportEvent;
	public TransportEvent|Optional $TransportEvent;
	public ApplicableTransportMeans|Optional $ApplicableTransportMeans;
	public HaulageTradingTerms|Optional $HaulageTradingTerms;
	public HazardousGoodsTransit|Optional $HazardousGoodsTransit;
	public PackagedTransportHandlingUnit|Optional $PackagedTransportHandlingUnit;
	public ServiceAllowanceCharge|Optional $ServiceAllowanceCharge;
	public FreightAllowanceCharge|Optional $FreightAllowanceCharge;
	public AttachedTransportEquipment|Optional $AttachedTransportEquipment;
	public Delivery|Optional $Delivery;
	public Pickup|Optional $Pickup;
	public Despatch|Optional $Despatch;
	public ShipmentDocumentReference|Optional $ShipmentDocumentReference;
	public ContainedInTransportEquipment|Optional $ContainedInTransportEquipment;
	public Package|Optional $Package;
	public GoodsItem|Optional $GoodsItem;
}
