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
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class ContainingTransportEquipment extends Data
{
	public string|Optional $ID;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $ReferencedConsignmentID;
	public string|Optional $TransportEquipmentTypeCode;
	public string|Optional $ProviderTypeCode;
	public string|Optional $OwnerTypeCode;
	public string|Optional $SizeTypeCode;
	public string|Optional $DispositionCode;
	public string|Optional $FullnessIndicationCode;
	public bool|Optional $RefrigerationOnIndicator;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $Information;
	public bool|Optional $ReturnabilityIndicator;
	public bool|Optional $LegalStatusIndicator;
	public string|Optional $AirFlowPercent;
	public string|Optional $HumidityPercent;
	public bool|Optional $AnimalFoodApprovedIndicator;
	public bool|Optional $HumanFoodApprovedIndicator;
	public bool|Optional $DangerousGoodsApprovedIndicator;
	public bool|Optional $RefrigeratedIndicator;
	public string|Optional $Characteristics;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $DamageRemarks;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $Description;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $SpecialTransportRequirements;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossWeightMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossVolumeMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TareWeightMeasure;
	public string|Optional $TrackingDeviceCode;
	public bool|Optional $PowerIndicator;
	public string|Optional $TraceID;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public MeasurementDimension|Optional $MeasurementDimension;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentSealType\TransportEquipmentSeal')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
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

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PositioningTransportEvent')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public PositioningTransportEvent|Optional $PositioningTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\QuarantineTransportEvent')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public QuarantineTransportEvent|Optional $QuarantineTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\DeliveryTransportEvent')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DeliveryTransportEvent|Optional $DeliveryTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PickupTransportEvent')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public PickupTransportEvent|Optional $PickupTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\HandlingTransportEvent')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public HandlingTransportEvent|Optional $HandlingTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\LoadingTransportEvent')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public LoadingTransportEvent|Optional $LoadingTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\TransportEvent')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public TransportEvent|Optional $TransportEvent;
	public ApplicableTransportMeans|Optional $ApplicableTransportMeans;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TradingTermsType\HaulageTradingTerms')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public HaulageTradingTerms|Optional $HaulageTradingTerms;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public HazardousGoodsTransit|Optional $HazardousGoodsTransit;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportHandlingUnitType\PackagedTransportHandlingUnit')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public PackagedTransportHandlingUnit|Optional $PackagedTransportHandlingUnit;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\ServiceAllowanceCharge')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ServiceAllowanceCharge|Optional $ServiceAllowanceCharge;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\FreightAllowanceCharge')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public FreightAllowanceCharge|Optional $FreightAllowanceCharge;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\AttachedTransportEquipment')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public AttachedTransportEquipment|Optional $AttachedTransportEquipment;
	public Delivery|Optional $Delivery;
	public Pickup|Optional $Pickup;
	public Despatch|Optional $Despatch;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ShipmentDocumentReference')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ShipmentDocumentReference|Optional $ShipmentDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\ContainedInTransportEquipment')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ContainedInTransportEquipment|Optional $ContainedInTransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PackageType\Package')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public Package|Optional $Package;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public GoodsItem|Optional $GoodsItem;
}
