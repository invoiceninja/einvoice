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
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
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

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $TransportationServiceDescription;
	public string|Optional $TransportationServiceDetailsURI;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $NominationDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $NominationTime;
	public string|Optional $Name;
	public string|Optional $SequenceNumeric;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\TransportEquipment')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public TransportEquipment|Optional $TransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\SupportedTransportEquipment')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public SupportedTransportEquipment|Optional $SupportedTransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\UnsupportedTransportEquipment')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public UnsupportedTransportEquipment|Optional $UnsupportedTransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\CommodityClassification')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public CommodityClassification|Optional $CommodityClassification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\SupportedCommodityClassification')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public SupportedCommodityClassification|Optional $SupportedCommodityClassification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\UnsupportedCommodityClassification')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public UnsupportedCommodityClassification|Optional $UnsupportedCommodityClassification;
	public TotalCapacityDimension|Optional $TotalCapacityDimension;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ShipmentStageType\ShipmentStage')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ShipmentStage|Optional $ShipmentStage;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\TransportEvent')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public TransportEvent|Optional $TransportEvent;
	public ResponsibleTransportServiceProviderParty|Optional $ResponsibleTransportServiceProviderParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\EnvironmentalEmissionType\EnvironmentalEmission')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public EnvironmentalEmission|Optional $EnvironmentalEmission;
	public EstimatedDurationPeriod|Optional $EstimatedDurationPeriod;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ServiceFrequencyType\ScheduledServiceFrequency')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ScheduledServiceFrequency|Optional $ScheduledServiceFrequency;
}
