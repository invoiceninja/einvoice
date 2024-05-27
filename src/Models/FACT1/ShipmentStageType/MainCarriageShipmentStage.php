<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ShipmentStageType;

use DateTime;
use DateTimeInterface;
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
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\CrewQuantity;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\PassengerQuantity;
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
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class MainCarriageShipmentStage
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:TransportModeCode')]
	public string $TransportModeCode;

	/** @var string */
	#[SerializedName('cbc:TransportMeansTypeCode')]
	public string $TransportMeansTypeCode;

	/** @var string */
	#[SerializedName('cbc:TransitDirectionCode')]
	public string $TransitDirectionCode;

	/** @var bool */
	#[SerializedName('cbc:PreCarriageIndicator')]
	public bool $PreCarriageIndicator;

	/** @var bool */
	#[SerializedName('cbc:OnCarriageIndicator')]
	public bool $OnCarriageIndicator;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:EstimatedDeliveryDate')]
	public DateTime $EstimatedDeliveryDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:EstimatedDeliveryTime')]
	public DateTime $EstimatedDeliveryTime;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:RequiredDeliveryDate')]
	public DateTime $RequiredDeliveryDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:RequiredDeliveryTime')]
	public DateTime $RequiredDeliveryTime;

	/** @var string */
	#[SerializedName('cbc:LoadingSequenceID')]
	public string $LoadingSequenceID;

	/** @var string */
	#[SerializedName('cbc:SuccessiveSequenceID')]
	public string $SuccessiveSequenceID;

	/** @var string */
	#[SerializedName('cbc:Instructions')]
	public string $Instructions;

	/** @var string */
	#[SerializedName('cbc:DemurrageInstructions')]
	public string $DemurrageInstructions;

	/** @var CrewQuantity */
	#[SerializedName('cbc:CrewQuantity')]
	public $CrewQuantity;

	/** @var PassengerQuantity */
	#[SerializedName('cbc:PassengerQuantity')]
	public $PassengerQuantity;

	/** @var TransitPeriod */
	#[SerializedName('cac:TransitPeriod')]
	public $TransitPeriod;

	/** @var CarrierParty[] */
	#[SerializedName('cac:CarrierParty')]
	public array $CarrierParty = [];

	/** @var TransportMeans */
	#[SerializedName('cac:TransportMeans')]
	public $TransportMeans;

	/** @var LoadingPortLocation */
	#[SerializedName('cac:LoadingPortLocation')]
	public $LoadingPortLocation;

	/** @var UnloadingPortLocation */
	#[SerializedName('cac:UnloadingPortLocation')]
	public $UnloadingPortLocation;

	/** @var TransshipPortLocation */
	#[SerializedName('cac:TransshipPortLocation')]
	public $TransshipPortLocation;

	/** @var LoadingTransportEvent */
	#[SerializedName('cac:LoadingTransportEvent')]
	public $LoadingTransportEvent;

	/** @var ExaminationTransportEvent */
	#[SerializedName('cac:ExaminationTransportEvent')]
	public $ExaminationTransportEvent;

	/** @var AvailabilityTransportEvent */
	#[SerializedName('cac:AvailabilityTransportEvent')]
	public $AvailabilityTransportEvent;

	/** @var ExportationTransportEvent */
	#[SerializedName('cac:ExportationTransportEvent')]
	public $ExportationTransportEvent;

	/** @var DischargeTransportEvent */
	#[SerializedName('cac:DischargeTransportEvent')]
	public $DischargeTransportEvent;

	/** @var WarehousingTransportEvent */
	#[SerializedName('cac:WarehousingTransportEvent')]
	public $WarehousingTransportEvent;

	/** @var TakeoverTransportEvent */
	#[SerializedName('cac:TakeoverTransportEvent')]
	public $TakeoverTransportEvent;

	/** @var OptionalTakeoverTransportEvent */
	#[SerializedName('cac:OptionalTakeoverTransportEvent')]
	public $OptionalTakeoverTransportEvent;

	/** @var DropoffTransportEvent */
	#[SerializedName('cac:DropoffTransportEvent')]
	public $DropoffTransportEvent;

	/** @var ActualPickupTransportEvent */
	#[SerializedName('cac:ActualPickupTransportEvent')]
	public $ActualPickupTransportEvent;

	/** @var DeliveryTransportEvent */
	#[SerializedName('cac:DeliveryTransportEvent')]
	public $DeliveryTransportEvent;

	/** @var ReceiptTransportEvent */
	#[SerializedName('cac:ReceiptTransportEvent')]
	public $ReceiptTransportEvent;

	/** @var StorageTransportEvent */
	#[SerializedName('cac:StorageTransportEvent')]
	public $StorageTransportEvent;

	/** @var AcceptanceTransportEvent */
	#[SerializedName('cac:AcceptanceTransportEvent')]
	public $AcceptanceTransportEvent;

	/** @var TerminalOperatorParty */
	#[SerializedName('cac:TerminalOperatorParty')]
	public $TerminalOperatorParty;

	/** @var CustomsAgentParty */
	#[SerializedName('cac:CustomsAgentParty')]
	public $CustomsAgentParty;

	/** @var EstimatedTransitPeriod */
	#[SerializedName('cac:EstimatedTransitPeriod')]
	public $EstimatedTransitPeriod;

	/** @var FreightAllowanceCharge[] */
	#[SerializedName('cac:FreightAllowanceCharge')]
	public array $FreightAllowanceCharge = [];

	/** @var FreightChargeLocation */
	#[SerializedName('cac:FreightChargeLocation')]
	public $FreightChargeLocation;

	/** @var DetentionTransportEvent[] */
	#[SerializedName('cac:DetentionTransportEvent')]
	public array $DetentionTransportEvent = [];

	/** @var RequestedDepartureTransportEvent */
	#[SerializedName('cac:RequestedDepartureTransportEvent')]
	public $RequestedDepartureTransportEvent;

	/** @var RequestedArrivalTransportEvent */
	#[SerializedName('cac:RequestedArrivalTransportEvent')]
	public $RequestedArrivalTransportEvent;

	/** @var RequestedWaypointTransportEvent[] */
	#[SerializedName('cac:RequestedWaypointTransportEvent')]
	public array $RequestedWaypointTransportEvent = [];

	/** @var PlannedDepartureTransportEvent */
	#[SerializedName('cac:PlannedDepartureTransportEvent')]
	public $PlannedDepartureTransportEvent;

	/** @var PlannedArrivalTransportEvent */
	#[SerializedName('cac:PlannedArrivalTransportEvent')]
	public $PlannedArrivalTransportEvent;

	/** @var PlannedWaypointTransportEvent[] */
	#[SerializedName('cac:PlannedWaypointTransportEvent')]
	public array $PlannedWaypointTransportEvent = [];

	/** @var ActualDepartureTransportEvent */
	#[SerializedName('cac:ActualDepartureTransportEvent')]
	public $ActualDepartureTransportEvent;

	/** @var ActualWaypointTransportEvent */
	#[SerializedName('cac:ActualWaypointTransportEvent')]
	public $ActualWaypointTransportEvent;

	/** @var ActualArrivalTransportEvent */
	#[SerializedName('cac:ActualArrivalTransportEvent')]
	public $ActualArrivalTransportEvent;

	/** @var TransportEvent[] */
	#[SerializedName('cac:TransportEvent')]
	public array $TransportEvent = [];

	/** @var EstimatedDepartureTransportEvent */
	#[SerializedName('cac:EstimatedDepartureTransportEvent')]
	public $EstimatedDepartureTransportEvent;

	/** @var EstimatedArrivalTransportEvent */
	#[SerializedName('cac:EstimatedArrivalTransportEvent')]
	public $EstimatedArrivalTransportEvent;

	/** @var PassengerPerson[] */
	#[SerializedName('cac:PassengerPerson')]
	public array $PassengerPerson = [];

	/** @var DriverPerson[] */
	#[SerializedName('cac:DriverPerson')]
	public array $DriverPerson = [];

	/** @var ReportingPerson */
	#[SerializedName('cac:ReportingPerson')]
	public $ReportingPerson;

	/** @var CrewMemberPerson[] */
	#[SerializedName('cac:CrewMemberPerson')]
	public array $CrewMemberPerson = [];

	/** @var SecurityOfficerPerson */
	#[SerializedName('cac:SecurityOfficerPerson')]
	public $SecurityOfficerPerson;

	/** @var MasterPerson */
	#[SerializedName('cac:MasterPerson')]
	public $MasterPerson;

	/** @var ShipsSurgeonPerson */
	#[SerializedName('cac:ShipsSurgeonPerson')]
	public $ShipsSurgeonPerson;
}
