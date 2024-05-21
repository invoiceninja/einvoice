<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransportationServiceType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\CommodityClassification;
use Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\SupportedCommodityClassification;
use Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\UnsupportedCommodityClassification;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\TotalCapacityDimension;
use Invoiceninja\Einvoice\Models\FACT1\EnvironmentalEmissionType\EnvironmentalEmission;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\ResponsibleTransportServiceProviderParty;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\EstimatedDurationPeriod;
use Invoiceninja\Einvoice\Models\FACT1\ServiceFrequencyType\ScheduledServiceFrequency;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentStageType\ShipmentStage;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\SupportedTransportEquipment;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\TransportEquipment;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\UnsupportedTransportEquipment;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\TransportEvent;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class OriginalDespatchTransportationService extends Data
{
	#[Required]
	public string $TransportServiceCode;
	public string|Optional $TariffClassCode;
	public string|Optional $Priority;
	public string|Optional $FreightRateClassCode;

	#[DataCollectionOf('TransportationServiceDescription')]
	public string|Optional $TransportationServiceDescription;
	public string|Optional $TransportationServiceDetailsURI;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $NominationDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $NominationTime;
	public string|Optional $Name;
	public string|Optional $SequenceNumeric;

	#[DataCollectionOf('TransportEquipment')]
	public TransportEquipment|Optional $TransportEquipment;

	#[DataCollectionOf('SupportedTransportEquipment')]
	public SupportedTransportEquipment|Optional $SupportedTransportEquipment;

	#[DataCollectionOf('UnsupportedTransportEquipment')]
	public UnsupportedTransportEquipment|Optional $UnsupportedTransportEquipment;

	#[DataCollectionOf('CommodityClassification')]
	public CommodityClassification|Optional $CommodityClassification;

	#[DataCollectionOf('SupportedCommodityClassification')]
	public SupportedCommodityClassification|Optional $SupportedCommodityClassification;

	#[DataCollectionOf('UnsupportedCommodityClassification')]
	public UnsupportedCommodityClassification|Optional $UnsupportedCommodityClassification;
	public TotalCapacityDimension|Optional $TotalCapacityDimension;

	#[DataCollectionOf('ShipmentStage')]
	public ShipmentStage|Optional $ShipmentStage;

	#[DataCollectionOf('TransportEvent')]
	public TransportEvent|Optional $TransportEvent;
	public ResponsibleTransportServiceProviderParty|Optional $ResponsibleTransportServiceProviderParty;

	#[DataCollectionOf('EnvironmentalEmission')]
	public EnvironmentalEmission|Optional $EnvironmentalEmission;
	public EstimatedDurationPeriod|Optional $EstimatedDurationPeriod;

	#[DataCollectionOf('ScheduledServiceFrequency')]
	public ScheduledServiceFrequency|Optional $ScheduledServiceFrequency;
}
