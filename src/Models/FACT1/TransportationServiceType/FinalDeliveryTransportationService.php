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
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class FinalDeliveryTransportationService extends Data
{
	#[Required]
	public string $TransportServiceCode;
	public string|Optional $TariffClassCode;
	public string|Optional $Priority;
	public string|Optional $FreightRateClassCode;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TransportationServiceDescription;
	public string|Optional $TransportationServiceDetailsURI;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $NominationDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $NominationTime;
	public string|Optional $Name;
	public string|Optional $SequenceNumeric;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\TransportEquipment')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\SupportedTransportEquipment')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $SupportedTransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\UnsupportedTransportEquipment')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $UnsupportedTransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\CommodityClassification')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $CommodityClassification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\SupportedCommodityClassification')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $SupportedCommodityClassification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\UnsupportedCommodityClassification')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $UnsupportedCommodityClassification;
	public TotalCapacityDimension|Optional $TotalCapacityDimension;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ShipmentStageType\ShipmentStage')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ShipmentStage;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEventType\TransportEvent')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TransportEvent;
	public ResponsibleTransportServiceProviderParty|Optional $ResponsibleTransportServiceProviderParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\EnvironmentalEmissionType\EnvironmentalEmission')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $EnvironmentalEmission;
	public EstimatedDurationPeriod|Optional $EstimatedDurationPeriod;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ServiceFrequencyType\ScheduledServiceFrequency')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ScheduledServiceFrequency;
}
