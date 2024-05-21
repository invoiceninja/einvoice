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
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class OriginalDespatchTransportationService extends Data
{
	#[Required]
	public ?string $TransportServiceCode;
	public string|Optional $TariffClassCode;
	public string|Optional $Priority;
	public string|Optional $FreightRateClassCode;

	/** @param array<TransportationServiceDescription> $TransportationServiceDescription */
	public array|Optional $TransportationServiceDescription;
	public string|Optional $TransportationServiceDetailsURI;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $NominationDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $NominationTime;
	public string|Optional $Name;
	public string|Optional $SequenceNumeric;

	/** @param array<TransportEquipment> $TransportEquipment */
	public array|Optional $TransportEquipment;

	/** @param array<SupportedTransportEquipment> $SupportedTransportEquipment */
	public array|Optional $SupportedTransportEquipment;

	/** @param array<UnsupportedTransportEquipment> $UnsupportedTransportEquipment */
	public array|Optional $UnsupportedTransportEquipment;

	/** @param array<CommodityClassification> $CommodityClassification */
	public array|Optional $CommodityClassification;

	/** @param array<SupportedCommodityClassification> $SupportedCommodityClassification */
	public array|Optional $SupportedCommodityClassification;

	/** @param array<UnsupportedCommodityClassification> $UnsupportedCommodityClassification */
	public array|Optional $UnsupportedCommodityClassification;
	public TotalCapacityDimension|Optional $TotalCapacityDimension;

	/** @param array<ShipmentStage> $ShipmentStage */
	public array|Optional $ShipmentStage;

	/** @param array<TransportEvent> $TransportEvent */
	public array|Optional $TransportEvent;
	public ResponsibleTransportServiceProviderParty|Optional $ResponsibleTransportServiceProviderParty;

	/** @param array<EnvironmentalEmission> $EnvironmentalEmission */
	public array|Optional $EnvironmentalEmission;
	public EstimatedDurationPeriod|Optional $EstimatedDurationPeriod;

	/** @param array<ScheduledServiceFrequency> $ScheduledServiceFrequency */
	public array|Optional $ScheduledServiceFrequency;
}
