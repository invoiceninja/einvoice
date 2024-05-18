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
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class OriginalDespatchTransportationService extends Data
{
	public ?string $TransportServiceCode;
	public string|Optional $TariffClassCode;
	public string|Optional $Priority;
	public string|Optional $FreightRateClassCode;
	public string|Optional $TransportationServiceDescription;
	public string|Optional $TransportationServiceDetailsURI;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $NominationDate;
	public \time|Optional $NominationTime;
	public string|Optional $Name;
	public string|Optional $SequenceNumeric;
	public TransportEquipment|Optional $TransportEquipment;
	public SupportedTransportEquipment|Optional $SupportedTransportEquipment;
	public UnsupportedTransportEquipment|Optional $UnsupportedTransportEquipment;
	public CommodityClassification|Optional $CommodityClassification;
	public SupportedCommodityClassification|Optional $SupportedCommodityClassification;
	public UnsupportedCommodityClassification|Optional $UnsupportedCommodityClassification;
	public TotalCapacityDimension|Optional $TotalCapacityDimension;
	public ShipmentStage|Optional $ShipmentStage;
	public TransportEvent|Optional $TransportEvent;
	public ResponsibleTransportServiceProviderParty|Optional $ResponsibleTransportServiceProviderParty;
	public EnvironmentalEmission|Optional $EnvironmentalEmission;
	public EstimatedDurationPeriod|Optional $EstimatedDurationPeriod;
	public ScheduledServiceFrequency|Optional $ScheduledServiceFrequency;
}
