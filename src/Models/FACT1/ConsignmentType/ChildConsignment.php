<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ConsignmentType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\ExtraAllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\FreightAllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\ContractType\TransportContract;
use Invoiceninja\Einvoice\Models\FACT1\CountryType\FinalDestinationCountry;
use Invoiceninja\Einvoice\Models\FACT1\CountryType\OriginalDepartureCountry;
use Invoiceninja\Einvoice\Models\FACT1\CountryType\TransitCountry;
use Invoiceninja\Einvoice\Models\FACT1\CustomsDeclarationType\CustomsDeclaration;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryTermsType\DeliveryTerms;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\FirstArrivalPortLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\LastExitPortLocation;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\BillOfLadingHolderParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\CarrierParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\ConsigneeParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\ConsignorParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\ExporterParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\FinalDeliveryParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\FreightForwarderParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\HazardousItemNotificationParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\ImporterParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\InsuranceParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\LogisticsOperatorParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\MortgageHolderParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\NotifyParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\OriginalDespatchParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\PerformingCarrierParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\SubstituteCarrierParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\TransportAdvisorParty;
use Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType\CollectPaymentTerms;
use Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType\DisbursementPaymentTerms;
use Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType\PaymentTerms;
use Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType\PrepaidPaymentTerms;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentStageType\MainCarriageShipmentStage;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentStageType\OnCarriageShipmentStage;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentStageType\PreCarriageShipmentStage;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\ConsolidatedShipment;
use Invoiceninja\Einvoice\Models\FACT1\StatusType\Status;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PlannedDeliveryTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\PlannedPickupTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\RequestedDeliveryTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\RequestedPickupTransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportEventType\TransportEvent;
use Invoiceninja\Einvoice\Models\FACT1\TransportHandlingUnitType\TransportHandlingUnit;
use Invoiceninja\Einvoice\Models\FACT1\TransportationServiceType\FinalDeliveryTransportationService;
use Invoiceninja\Einvoice\Models\FACT1\TransportationServiceType\OriginalDespatchTransportationService;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ChildConsignment extends Data
{
	public ?string $ID;
	public string|Optional $CarrierAssignedID;
	public string|Optional $ConsigneeAssignedID;
	public string|Optional $ConsignorAssignedID;
	public string|Optional $FreightForwarderAssignedID;
	public string|Optional $BrokerAssignedID;
	public string|Optional $ContractedCarrierAssignedID;
	public string|Optional $PerformingCarrierAssignedID;
	public string|Optional $SummaryDescription;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalInvoiceAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeclaredCustomsValueAmount;
	public string|Optional $TariffDescription;
	public string|Optional $TariffCode;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $InsurancePremiumAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossWeightMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetWeightMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetNetWeightMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ChargeableWeightMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossVolumeMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetVolumeMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $LoadingLengthMeasure;
	public string|Optional $Remarks;
	public bool|Optional $HazardousRiskIndicator;
	public bool|Optional $AnimalFoodIndicator;
	public bool|Optional $HumanFoodIndicator;
	public bool|Optional $LivestockIndicator;
	public bool|Optional $BulkCargoIndicator;
	public bool|Optional $ContainerizedIndicator;
	public bool|Optional $GeneralCargoIndicator;
	public bool|Optional $SpecialSecurityIndicator;
	public bool|Optional $ThirdPartyPayerIndicator;
	public string|Optional $CarrierServiceInstructions;
	public string|Optional $CustomsClearanceServiceInstructions;
	public string|Optional $ForwarderServiceInstructions;
	public string|Optional $SpecialServiceInstructions;
	public string|Optional $SequenceID;
	public string|Optional $ShippingPriorityLevelCode;
	public string|Optional $HandlingCode;
	public string|Optional $HandlingInstructions;
	public string|Optional $Information;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalGoodsItemQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalTransportHandlingUnitQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $InsuranceValueAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeclaredForCarriageValueAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeclaredStatisticsValueAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $FreeOnBoardValueAmount;
	public string|Optional $SpecialInstructions;
	public bool|Optional $SplitConsignmentIndicator;
	public string|Optional $DeliveryInstructions;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ConsignmentQuantity;
	public bool|Optional $ConsolidatableIndicator;
	public string|Optional $HaulageInstructions;
	public string|Optional $LoadingSequenceID;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ChildConsignmentQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalPackagesQuantity;
	public ConsolidatedShipment|Optional $ConsolidatedShipment;
	public CustomsDeclaration|Optional $CustomsDeclaration;
	public RequestedPickupTransportEvent|Optional $RequestedPickupTransportEvent;
	public RequestedDeliveryTransportEvent|Optional $RequestedDeliveryTransportEvent;
	public PlannedPickupTransportEvent|Optional $PlannedPickupTransportEvent;
	public PlannedDeliveryTransportEvent|Optional $PlannedDeliveryTransportEvent;
	public Status|Optional $Status;
	public ConsigneeParty|Optional $ConsigneeParty;
	public ExporterParty|Optional $ExporterParty;
	public ConsignorParty|Optional $ConsignorParty;
	public ImporterParty|Optional $ImporterParty;
	public CarrierParty|Optional $CarrierParty;
	public FreightForwarderParty|Optional $FreightForwarderParty;
	public NotifyParty|Optional $NotifyParty;
	public OriginalDespatchParty|Optional $OriginalDespatchParty;
	public FinalDeliveryParty|Optional $FinalDeliveryParty;
	public PerformingCarrierParty|Optional $PerformingCarrierParty;
	public SubstituteCarrierParty|Optional $SubstituteCarrierParty;
	public LogisticsOperatorParty|Optional $LogisticsOperatorParty;
	public TransportAdvisorParty|Optional $TransportAdvisorParty;
	public HazardousItemNotificationParty|Optional $HazardousItemNotificationParty;
	public InsuranceParty|Optional $InsuranceParty;
	public MortgageHolderParty|Optional $MortgageHolderParty;
	public BillOfLadingHolderParty|Optional $BillOfLadingHolderParty;
	public OriginalDepartureCountry|Optional $OriginalDepartureCountry;
	public FinalDestinationCountry|Optional $FinalDestinationCountry;
	public TransitCountry|Optional $TransitCountry;
	public TransportContract|Optional $TransportContract;
	public TransportEvent|Optional $TransportEvent;
	public OriginalDespatchTransportationService|Optional $OriginalDespatchTransportationService;
	public FinalDeliveryTransportationService|Optional $FinalDeliveryTransportationService;
	public DeliveryTerms|Optional $DeliveryTerms;
	public PaymentTerms|Optional $PaymentTerms;
	public CollectPaymentTerms|Optional $CollectPaymentTerms;
	public DisbursementPaymentTerms|Optional $DisbursementPaymentTerms;
	public PrepaidPaymentTerms|Optional $PrepaidPaymentTerms;
	public FreightAllowanceCharge|Optional $FreightAllowanceCharge;
	public ExtraAllowanceCharge|Optional $ExtraAllowanceCharge;
	public MainCarriageShipmentStage|Optional $MainCarriageShipmentStage;
	public PreCarriageShipmentStage|Optional $PreCarriageShipmentStage;
	public OnCarriageShipmentStage|Optional $OnCarriageShipmentStage;
	public TransportHandlingUnit|Optional $TransportHandlingUnit;
	public FirstArrivalPortLocation|Optional $FirstArrivalPortLocation;
	public LastExitPortLocation|Optional $LastExitPortLocation;
}
