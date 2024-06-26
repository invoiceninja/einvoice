<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ShipmentStageType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\FreightAllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TransitDirectionCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TransportMeansTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TransportModeCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\LoadingSequenceID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\SuccessiveSequenceID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\FreightChargeLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\LoadingPortLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\TransshipPortLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\UnloadingPortLocation;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\CarrierParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\CustomsAgentParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\TerminalOperatorParty;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\EstimatedTransitPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\TransitPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PersonType\CrewMemberPerson;
use InvoiceNinja\EInvoice\Models\Peppol\PersonType\DriverPerson;
use InvoiceNinja\EInvoice\Models\Peppol\PersonType\MasterPerson;
use InvoiceNinja\EInvoice\Models\Peppol\PersonType\PassengerPerson;
use InvoiceNinja\EInvoice\Models\Peppol\PersonType\ReportingPerson;
use InvoiceNinja\EInvoice\Models\Peppol\PersonType\SecurityOfficerPerson;
use InvoiceNinja\EInvoice\Models\Peppol\PersonType\ShipsSurgeonPerson;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\CrewQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\PassengerQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\AcceptanceTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ActualArrivalTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ActualDepartureTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ActualPickupTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ActualWaypointTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\AvailabilityTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\DeliveryTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\DetentionTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\DischargeTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\DropoffTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\EstimatedArrivalTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\EstimatedDepartureTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ExaminationTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ExportationTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\LoadingTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\OptionalTakeoverTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PlannedArrivalTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PlannedDepartureTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PlannedWaypointTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ReceiptTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\RequestedArrivalTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\RequestedDepartureTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\RequestedWaypointTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\StorageTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\TakeoverTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\TransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\WarehousingTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportMeansType\TransportMeans;
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

class OnCarriageShipmentStage
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var TransportModeCode */
	#[SerializedName('cbc:TransportModeCode')]
	public $TransportModeCode;

	/** @var TransportMeansTypeCode */
	#[SerializedName('cbc:TransportMeansTypeCode')]
	public $TransportMeansTypeCode;

	/** @var TransitDirectionCode */
	#[SerializedName('cbc:TransitDirectionCode')]
	public $TransitDirectionCode;

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

	/** @var LoadingSequenceID */
	#[SerializedName('cbc:LoadingSequenceID')]
	public $LoadingSequenceID;

	/** @var SuccessiveSequenceID */
	#[SerializedName('cbc:SuccessiveSequenceID')]
	public $SuccessiveSequenceID;

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
	public array $CarrierParty;

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
	public array $FreightAllowanceCharge;

	/** @var FreightChargeLocation */
	#[SerializedName('cac:FreightChargeLocation')]
	public $FreightChargeLocation;

	/** @var DetentionTransportEvent[] */
	#[SerializedName('cac:DetentionTransportEvent')]
	public array $DetentionTransportEvent;

	/** @var RequestedDepartureTransportEvent */
	#[SerializedName('cac:RequestedDepartureTransportEvent')]
	public $RequestedDepartureTransportEvent;

	/** @var RequestedArrivalTransportEvent */
	#[SerializedName('cac:RequestedArrivalTransportEvent')]
	public $RequestedArrivalTransportEvent;

	/** @var RequestedWaypointTransportEvent[] */
	#[SerializedName('cac:RequestedWaypointTransportEvent')]
	public array $RequestedWaypointTransportEvent;

	/** @var PlannedDepartureTransportEvent */
	#[SerializedName('cac:PlannedDepartureTransportEvent')]
	public $PlannedDepartureTransportEvent;

	/** @var PlannedArrivalTransportEvent */
	#[SerializedName('cac:PlannedArrivalTransportEvent')]
	public $PlannedArrivalTransportEvent;

	/** @var PlannedWaypointTransportEvent[] */
	#[SerializedName('cac:PlannedWaypointTransportEvent')]
	public array $PlannedWaypointTransportEvent;

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
	public array $TransportEvent;

	/** @var EstimatedDepartureTransportEvent */
	#[SerializedName('cac:EstimatedDepartureTransportEvent')]
	public $EstimatedDepartureTransportEvent;

	/** @var EstimatedArrivalTransportEvent */
	#[SerializedName('cac:EstimatedArrivalTransportEvent')]
	public $EstimatedArrivalTransportEvent;

	/** @var PassengerPerson[] */
	#[SerializedName('cac:PassengerPerson')]
	public array $PassengerPerson;

	/** @var DriverPerson[] */
	#[SerializedName('cac:DriverPerson')]
	public array $DriverPerson;

	/** @var ReportingPerson */
	#[SerializedName('cac:ReportingPerson')]
	public $ReportingPerson;

	/** @var CrewMemberPerson[] */
	#[SerializedName('cac:CrewMemberPerson')]
	public array $CrewMemberPerson;

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
