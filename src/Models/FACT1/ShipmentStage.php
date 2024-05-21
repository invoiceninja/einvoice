<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\FreightAllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\FreightChargeLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\LoadingPortLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\TransshipPortLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\UnloadingPortLocation;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\CarrierParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\CustomsAgentParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\TerminalOperatorParty;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\EstimatedTransitPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\TransitPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PersonType\CrewMemberPerson;
use Invoiceninja\Einvoice\Models\FACT1\PersonType\DriverPerson;
use Invoiceninja\Einvoice\Models\FACT1\PersonType\MasterPerson;
use Invoiceninja\Einvoice\Models\FACT1\PersonType\PassengerPerson;
use Invoiceninja\Einvoice\Models\FACT1\PersonType\ReportingPerson;
use Invoiceninja\Einvoice\Models\FACT1\PersonType\SecurityOfficerPerson;
use Invoiceninja\Einvoice\Models\FACT1\PersonType\ShipsSurgeonPerson;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\AcceptanceTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\ActualArrivalTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\ActualDepartureTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\ActualPickupTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\ActualWaypointTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\AvailabilityTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\DeliveryTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\DetentionTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\DischargeTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\DropoffTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\EstimatedArrivalTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\EstimatedDepartureTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\ExaminationTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\ExportationTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\LoadingTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\OptionalTakeoverTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PlannedArrivalTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PlannedDepartureTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PlannedWaypointTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\ReceiptTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\RequestedArrivalTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\RequestedDepartureTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\RequestedWaypointTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\StorageTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\TakeoverTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\TransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\WarehousingTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportMeansType\TransportMeans;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ShipmentStage extends Data
{
	public string|Optional $ID;
	public string|Optional $TransportModeCode;
	public string|Optional $TransportMeansTypeCode;
	public string|Optional $TransitDirectionCode;
	public bool|Optional $PreCarriageIndicator;
	public bool|Optional $OnCarriageIndicator;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $EstimatedDeliveryDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $EstimatedDeliveryTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $RequiredDeliveryDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $RequiredDeliveryTime;
	public string|Optional $LoadingSequenceID;
	public string|Optional $SuccessiveSequenceID;

	#[DataCollectionOf('Instructions')]
	public string|Optional $Instructions;

	#[DataCollectionOf('DemurrageInstructions')]
	public string|Optional $DemurrageInstructions;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $CrewQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PassengerQuantity;
	public TransitPeriod|Optional $TransitPeriod;

	#[DataCollectionOf('CarrierParty')]
	public CarrierParty|Optional $CarrierParty;
	public TransportMeans|Optional $TransportMeans;
	public LoadingPortLocation|Optional $LoadingPortLocation;
	public UnloadingPortLocation|Optional $UnloadingPortLocation;
	public TransshipPortLocation|Optional $TransshipPortLocation;
	public LoadingTransportEvent|Optional $LoadingTransportEvent;
	public ExaminationTransportEvent|Optional $ExaminationTransportEvent;
	public AvailabilityTransportEvent|Optional $AvailabilityTransportEvent;
	public ExportationTransportEvent|Optional $ExportationTransportEvent;
	public DischargeTransportEvent|Optional $DischargeTransportEvent;
	public WarehousingTransportEvent|Optional $WarehousingTransportEvent;
	public TakeoverTransportEvent|Optional $TakeoverTransportEvent;
	public OptionalTakeoverTransportEvent|Optional $OptionalTakeoverTransportEvent;
	public DropoffTransportEvent|Optional $DropoffTransportEvent;
	public ActualPickupTransportEvent|Optional $ActualPickupTransportEvent;
	public DeliveryTransportEvent|Optional $DeliveryTransportEvent;
	public ReceiptTransportEvent|Optional $ReceiptTransportEvent;
	public StorageTransportEvent|Optional $StorageTransportEvent;
	public AcceptanceTransportEvent|Optional $AcceptanceTransportEvent;
	public TerminalOperatorParty|Optional $TerminalOperatorParty;
	public CustomsAgentParty|Optional $CustomsAgentParty;
	public EstimatedTransitPeriod|Optional $EstimatedTransitPeriod;

	#[DataCollectionOf('FreightAllowanceCharge')]
	public FreightAllowanceCharge|Optional $FreightAllowanceCharge;
	public FreightChargeLocation|Optional $FreightChargeLocation;

	#[DataCollectionOf('DetentionTransportEvent')]
	public DetentionTransportEvent|Optional $DetentionTransportEvent;
	public RequestedDepartureTransportEvent|Optional $RequestedDepartureTransportEvent;
	public RequestedArrivalTransportEvent|Optional $RequestedArrivalTransportEvent;

	#[DataCollectionOf('RequestedWaypointTransportEvent')]
	public RequestedWaypointTransportEvent|Optional $RequestedWaypointTransportEvent;
	public PlannedDepartureTransportEvent|Optional $PlannedDepartureTransportEvent;
	public PlannedArrivalTransportEvent|Optional $PlannedArrivalTransportEvent;

	#[DataCollectionOf('PlannedWaypointTransportEvent')]
	public PlannedWaypointTransportEvent|Optional $PlannedWaypointTransportEvent;
	public ActualDepartureTransportEvent|Optional $ActualDepartureTransportEvent;
	public ActualWaypointTransportEvent|Optional $ActualWaypointTransportEvent;
	public ActualArrivalTransportEvent|Optional $ActualArrivalTransportEvent;

	#[DataCollectionOf('TransportEvent')]
	public TransportEvent|Optional $TransportEvent;
	public EstimatedDepartureTransportEvent|Optional $EstimatedDepartureTransportEvent;
	public EstimatedArrivalTransportEvent|Optional $EstimatedArrivalTransportEvent;

	#[DataCollectionOf('PassengerPerson')]
	public PassengerPerson|Optional $PassengerPerson;

	#[DataCollectionOf('DriverPerson')]
	public DriverPerson|Optional $DriverPerson;
	public ReportingPerson|Optional $ReportingPerson;

	#[DataCollectionOf('CrewMemberPerson')]
	public CrewMemberPerson|Optional $CrewMemberPerson;
	public SecurityOfficerPerson|Optional $SecurityOfficerPerson;
	public MasterPerson|Optional $MasterPerson;
	public ShipsSurgeonPerson|Optional $ShipsSurgeonPerson;
}
