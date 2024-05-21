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
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AttachedTransportEquipment extends Data
{
	public string|Optional $ID;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ReferencedConsignmentID;
	public string|Optional $TransportEquipmentTypeCode;
	public string|Optional $ProviderTypeCode;
	public string|Optional $OwnerTypeCode;
	public string|Optional $SizeTypeCode;
	public string|Optional $DispositionCode;
	public string|Optional $FullnessIndicationCode;
	public bool|Optional $RefrigerationOnIndicator;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Information;
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
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DamageRemarks;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Description;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $SpecialTransportRequirements;

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
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $MeasurementDimension;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentSealType\TransportEquipmentSeal')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TransportEquipmentSeal;
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
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PositioningTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\QuarantineTransportEvent')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $QuarantineTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\DeliveryTransportEvent')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DeliveryTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PickupTransportEvent')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PickupTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\HandlingTransportEvent')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $HandlingTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\LoadingTransportEvent')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $LoadingTransportEvent;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\TransportEvent')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TransportEvent;
	public ApplicableTransportMeans|Optional $ApplicableTransportMeans;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TradingTermsType\HaulageTradingTerms')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $HaulageTradingTerms;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $HazardousGoodsTransit;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportHandlingUnitType\PackagedTransportHandlingUnit')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PackagedTransportHandlingUnit;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\ServiceAllowanceCharge')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ServiceAllowanceCharge;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\FreightAllowanceCharge')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $FreightAllowanceCharge;
	public Delivery|Optional $Delivery;
	public Pickup|Optional $Pickup;
	public Despatch|Optional $Despatch;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ShipmentDocumentReference')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ShipmentDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\ContainedInTransportEquipment')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ContainedInTransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PackageType\Package')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Package;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $GoodsItem;
}
