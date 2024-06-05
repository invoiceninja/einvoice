<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\ConsignmentType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AllowanceChargeType\ExtraAllowanceCharge;
use Invoiceninja\Einvoice\Models\Peppol\AllowanceChargeType\FreightAllowanceCharge;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\DeclaredCustomsValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\DeclaredForCarriageValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\DeclaredStatisticsValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\FreeOnBoardValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\InsurancePremiumAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\InsuranceValueAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\TotalInvoiceAmount;
use Invoiceninja\Einvoice\Models\Peppol\ContractType\TransportContract;
use Invoiceninja\Einvoice\Models\Peppol\CountryType\FinalDestinationCountry;
use Invoiceninja\Einvoice\Models\Peppol\CountryType\OriginalDepartureCountry;
use Invoiceninja\Einvoice\Models\Peppol\CountryType\TransitCountry;
use Invoiceninja\Einvoice\Models\Peppol\CustomsDeclarationType\CustomsDeclaration;
use Invoiceninja\Einvoice\Models\Peppol\DeliveryTermsType\DeliveryTerms;
use Invoiceninja\Einvoice\Models\Peppol\LocationType\FirstArrivalPortLocation;
use Invoiceninja\Einvoice\Models\Peppol\LocationType\LastExitPortLocation;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\BillOfLadingHolderParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\CarrierParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\ConsigneeParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\ConsignorParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\ExporterParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\FinalDeliveryParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\FreightForwarderParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\HazardousItemNotificationParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\ImporterParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\InsuranceParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\LogisticsOperatorParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\MortgageHolderParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\NotifyParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\OriginalDespatchParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\PerformingCarrierParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\SubstituteCarrierParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\TransportAdvisorParty;
use Invoiceninja\Einvoice\Models\Peppol\PaymentTermsType\CollectPaymentTerms;
use Invoiceninja\Einvoice\Models\Peppol\PaymentTermsType\DisbursementPaymentTerms;
use Invoiceninja\Einvoice\Models\Peppol\PaymentTermsType\PaymentTerms;
use Invoiceninja\Einvoice\Models\Peppol\PaymentTermsType\PrepaidPaymentTerms;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\ChildConsignmentQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\ConsignmentQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\TotalGoodsItemQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\TotalPackagesQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\TotalTransportHandlingUnitQuantity;
use Invoiceninja\Einvoice\Models\Peppol\ShipmentStageType\MainCarriageShipmentStage;
use Invoiceninja\Einvoice\Models\Peppol\ShipmentStageType\OnCarriageShipmentStage;
use Invoiceninja\Einvoice\Models\Peppol\ShipmentStageType\PreCarriageShipmentStage;
use Invoiceninja\Einvoice\Models\Peppol\ShipmentType\ConsolidatedShipment;
use Invoiceninja\Einvoice\Models\Peppol\StatusType\Status;
use Invoiceninja\Einvoice\Models\Peppol\TransportEventType\PlannedDeliveryTransportEvent;
use Invoiceninja\Einvoice\Models\Peppol\TransportEventType\PlannedPickupTransportEvent;
use Invoiceninja\Einvoice\Models\Peppol\TransportEventType\RequestedDeliveryTransportEvent;
use Invoiceninja\Einvoice\Models\Peppol\TransportEventType\RequestedPickupTransportEvent;
use Invoiceninja\Einvoice\Models\Peppol\TransportEventType\TransportEvent;
use Invoiceninja\Einvoice\Models\Peppol\TransportHandlingUnitType\TransportHandlingUnit;
use Invoiceninja\Einvoice\Models\Peppol\TransportationServiceType\FinalDeliveryTransportationService;
use Invoiceninja\Einvoice\Models\Peppol\TransportationServiceType\OriginalDespatchTransportationService;
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

class Consignment
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:CarrierAssignedID')]
	public string $CarrierAssignedID;

	/** @var string */
	#[SerializedName('cbc:ConsigneeAssignedID')]
	public string $ConsigneeAssignedID;

	/** @var string */
	#[SerializedName('cbc:ConsignorAssignedID')]
	public string $ConsignorAssignedID;

	/** @var string */
	#[SerializedName('cbc:FreightForwarderAssignedID')]
	public string $FreightForwarderAssignedID;

	/** @var string */
	#[SerializedName('cbc:BrokerAssignedID')]
	public string $BrokerAssignedID;

	/** @var string */
	#[SerializedName('cbc:ContractedCarrierAssignedID')]
	public string $ContractedCarrierAssignedID;

	/** @var string */
	#[SerializedName('cbc:PerformingCarrierAssignedID')]
	public string $PerformingCarrierAssignedID;

	/** @var string */
	#[SerializedName('cbc:SummaryDescription')]
	public string $SummaryDescription;

	/** @var TotalInvoiceAmount */
	#[SerializedName('cbc:TotalInvoiceAmount')]
	public $TotalInvoiceAmount;

	/** @var DeclaredCustomsValueAmount */
	#[SerializedName('cbc:DeclaredCustomsValueAmount')]
	public $DeclaredCustomsValueAmount;

	/** @var string */
	#[SerializedName('cbc:TariffDescription')]
	public string $TariffDescription;

	/** @var string */
	#[SerializedName('cbc:TariffCode')]
	public string $TariffCode;

	/** @var InsurancePremiumAmount */
	#[SerializedName('cbc:InsurancePremiumAmount')]
	public $InsurancePremiumAmount;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:GrossWeightMeasure')]
	public string $GrossWeightMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:NetWeightMeasure')]
	public string $NetWeightMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:NetNetWeightMeasure')]
	public string $NetNetWeightMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:ChargeableWeightMeasure')]
	public string $ChargeableWeightMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:GrossVolumeMeasure')]
	public string $GrossVolumeMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:NetVolumeMeasure')]
	public string $NetVolumeMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:LoadingLengthMeasure')]
	public string $LoadingLengthMeasure;

	/** @var string */
	#[SerializedName('cbc:Remarks')]
	public string $Remarks;

	/** @var bool */
	#[SerializedName('cbc:HazardousRiskIndicator')]
	public bool $HazardousRiskIndicator;

	/** @var bool */
	#[SerializedName('cbc:AnimalFoodIndicator')]
	public bool $AnimalFoodIndicator;

	/** @var bool */
	#[SerializedName('cbc:HumanFoodIndicator')]
	public bool $HumanFoodIndicator;

	/** @var bool */
	#[SerializedName('cbc:LivestockIndicator')]
	public bool $LivestockIndicator;

	/** @var bool */
	#[SerializedName('cbc:BulkCargoIndicator')]
	public bool $BulkCargoIndicator;

	/** @var bool */
	#[SerializedName('cbc:ContainerizedIndicator')]
	public bool $ContainerizedIndicator;

	/** @var bool */
	#[SerializedName('cbc:GeneralCargoIndicator')]
	public bool $GeneralCargoIndicator;

	/** @var bool */
	#[SerializedName('cbc:SpecialSecurityIndicator')]
	public bool $SpecialSecurityIndicator;

	/** @var bool */
	#[SerializedName('cbc:ThirdPartyPayerIndicator')]
	public bool $ThirdPartyPayerIndicator;

	/** @var string */
	#[SerializedName('cbc:CarrierServiceInstructions')]
	public string $CarrierServiceInstructions;

	/** @var string */
	#[SerializedName('cbc:CustomsClearanceServiceInstructions')]
	public string $CustomsClearanceServiceInstructions;

	/** @var string */
	#[SerializedName('cbc:ForwarderServiceInstructions')]
	public string $ForwarderServiceInstructions;

	/** @var string */
	#[SerializedName('cbc:SpecialServiceInstructions')]
	public string $SpecialServiceInstructions;

	/** @var string */
	#[SerializedName('cbc:SequenceID')]
	public string $SequenceID;

	/** @var string */
	#[SerializedName('cbc:ShippingPriorityLevelCode')]
	public string $ShippingPriorityLevelCode;

	/** @var string */
	#[SerializedName('cbc:HandlingCode')]
	public string $HandlingCode;

	/** @var string */
	#[SerializedName('cbc:HandlingInstructions')]
	public string $HandlingInstructions;

	/** @var string */
	#[SerializedName('cbc:Information')]
	public string $Information;

	/** @var TotalGoodsItemQuantity */
	#[SerializedName('cbc:TotalGoodsItemQuantity')]
	public $TotalGoodsItemQuantity;

	/** @var TotalTransportHandlingUnitQuantity */
	#[SerializedName('cbc:TotalTransportHandlingUnitQuantity')]
	public $TotalTransportHandlingUnitQuantity;

	/** @var InsuranceValueAmount */
	#[SerializedName('cbc:InsuranceValueAmount')]
	public $InsuranceValueAmount;

	/** @var DeclaredForCarriageValueAmount */
	#[SerializedName('cbc:DeclaredForCarriageValueAmount')]
	public $DeclaredForCarriageValueAmount;

	/** @var DeclaredStatisticsValueAmount */
	#[SerializedName('cbc:DeclaredStatisticsValueAmount')]
	public $DeclaredStatisticsValueAmount;

	/** @var FreeOnBoardValueAmount */
	#[SerializedName('cbc:FreeOnBoardValueAmount')]
	public $FreeOnBoardValueAmount;

	/** @var string */
	#[SerializedName('cbc:SpecialInstructions')]
	public string $SpecialInstructions;

	/** @var bool */
	#[SerializedName('cbc:SplitConsignmentIndicator')]
	public bool $SplitConsignmentIndicator;

	/** @var string */
	#[SerializedName('cbc:DeliveryInstructions')]
	public string $DeliveryInstructions;

	/** @var ConsignmentQuantity */
	#[SerializedName('cbc:ConsignmentQuantity')]
	public $ConsignmentQuantity;

	/** @var bool */
	#[SerializedName('cbc:ConsolidatableIndicator')]
	public bool $ConsolidatableIndicator;

	/** @var string */
	#[SerializedName('cbc:HaulageInstructions')]
	public string $HaulageInstructions;

	/** @var string */
	#[SerializedName('cbc:LoadingSequenceID')]
	public string $LoadingSequenceID;

	/** @var ChildConsignmentQuantity */
	#[SerializedName('cbc:ChildConsignmentQuantity')]
	public $ChildConsignmentQuantity;

	/** @var TotalPackagesQuantity */
	#[SerializedName('cbc:TotalPackagesQuantity')]
	public $TotalPackagesQuantity;

	/** @var ConsolidatedShipment[] */
	#[SerializedName('cac:ConsolidatedShipment')]
	public array $ConsolidatedShipment;

	/** @var CustomsDeclaration[] */
	#[SerializedName('cac:CustomsDeclaration')]
	public array $CustomsDeclaration;

	/** @var RequestedPickupTransportEvent */
	#[SerializedName('cac:RequestedPickupTransportEvent')]
	public $RequestedPickupTransportEvent;

	/** @var RequestedDeliveryTransportEvent */
	#[SerializedName('cac:RequestedDeliveryTransportEvent')]
	public $RequestedDeliveryTransportEvent;

	/** @var PlannedPickupTransportEvent */
	#[SerializedName('cac:PlannedPickupTransportEvent')]
	public $PlannedPickupTransportEvent;

	/** @var PlannedDeliveryTransportEvent */
	#[SerializedName('cac:PlannedDeliveryTransportEvent')]
	public $PlannedDeliveryTransportEvent;

	/** @var Status[] */
	#[SerializedName('cac:Status')]
	public array $Status;

	/** @var ChildConsignment[] */
	#[SerializedName('cac:ChildConsignment')]
	public array $ChildConsignment;

	/** @var ConsigneeParty */
	#[SerializedName('cac:ConsigneeParty')]
	public $ConsigneeParty;

	/** @var ExporterParty */
	#[SerializedName('cac:ExporterParty')]
	public $ExporterParty;

	/** @var ConsignorParty */
	#[SerializedName('cac:ConsignorParty')]
	public $ConsignorParty;

	/** @var ImporterParty */
	#[SerializedName('cac:ImporterParty')]
	public $ImporterParty;

	/** @var CarrierParty */
	#[SerializedName('cac:CarrierParty')]
	public $CarrierParty;

	/** @var FreightForwarderParty */
	#[SerializedName('cac:FreightForwarderParty')]
	public $FreightForwarderParty;

	/** @var NotifyParty */
	#[SerializedName('cac:NotifyParty')]
	public $NotifyParty;

	/** @var OriginalDespatchParty */
	#[SerializedName('cac:OriginalDespatchParty')]
	public $OriginalDespatchParty;

	/** @var FinalDeliveryParty */
	#[SerializedName('cac:FinalDeliveryParty')]
	public $FinalDeliveryParty;

	/** @var PerformingCarrierParty */
	#[SerializedName('cac:PerformingCarrierParty')]
	public $PerformingCarrierParty;

	/** @var SubstituteCarrierParty */
	#[SerializedName('cac:SubstituteCarrierParty')]
	public $SubstituteCarrierParty;

	/** @var LogisticsOperatorParty */
	#[SerializedName('cac:LogisticsOperatorParty')]
	public $LogisticsOperatorParty;

	/** @var TransportAdvisorParty */
	#[SerializedName('cac:TransportAdvisorParty')]
	public $TransportAdvisorParty;

	/** @var HazardousItemNotificationParty */
	#[SerializedName('cac:HazardousItemNotificationParty')]
	public $HazardousItemNotificationParty;

	/** @var InsuranceParty */
	#[SerializedName('cac:InsuranceParty')]
	public $InsuranceParty;

	/** @var MortgageHolderParty */
	#[SerializedName('cac:MortgageHolderParty')]
	public $MortgageHolderParty;

	/** @var BillOfLadingHolderParty */
	#[SerializedName('cac:BillOfLadingHolderParty')]
	public $BillOfLadingHolderParty;

	/** @var OriginalDepartureCountry */
	#[SerializedName('cac:OriginalDepartureCountry')]
	public $OriginalDepartureCountry;

	/** @var FinalDestinationCountry */
	#[SerializedName('cac:FinalDestinationCountry')]
	public $FinalDestinationCountry;

	/** @var TransitCountry[] */
	#[SerializedName('cac:TransitCountry')]
	public array $TransitCountry;

	/** @var TransportContract */
	#[SerializedName('cac:TransportContract')]
	public $TransportContract;

	/** @var TransportEvent[] */
	#[SerializedName('cac:TransportEvent')]
	public array $TransportEvent;

	/** @var OriginalDespatchTransportationService */
	#[SerializedName('cac:OriginalDespatchTransportationService')]
	public $OriginalDespatchTransportationService;

	/** @var FinalDeliveryTransportationService */
	#[SerializedName('cac:FinalDeliveryTransportationService')]
	public $FinalDeliveryTransportationService;

	/** @var DeliveryTerms */
	#[SerializedName('cac:DeliveryTerms')]
	public $DeliveryTerms;

	/** @var PaymentTerms */
	#[SerializedName('cac:PaymentTerms')]
	public $PaymentTerms;

	/** @var CollectPaymentTerms */
	#[SerializedName('cac:CollectPaymentTerms')]
	public $CollectPaymentTerms;

	/** @var DisbursementPaymentTerms */
	#[SerializedName('cac:DisbursementPaymentTerms')]
	public $DisbursementPaymentTerms;

	/** @var PrepaidPaymentTerms */
	#[SerializedName('cac:PrepaidPaymentTerms')]
	public $PrepaidPaymentTerms;

	/** @var FreightAllowanceCharge[] */
	#[SerializedName('cac:FreightAllowanceCharge')]
	public array $FreightAllowanceCharge;

	/** @var ExtraAllowanceCharge[] */
	#[SerializedName('cac:ExtraAllowanceCharge')]
	public array $ExtraAllowanceCharge;

	/** @var MainCarriageShipmentStage[] */
	#[SerializedName('cac:MainCarriageShipmentStage')]
	public array $MainCarriageShipmentStage;

	/** @var PreCarriageShipmentStage[] */
	#[SerializedName('cac:PreCarriageShipmentStage')]
	public array $PreCarriageShipmentStage;

	/** @var OnCarriageShipmentStage[] */
	#[SerializedName('cac:OnCarriageShipmentStage')]
	public array $OnCarriageShipmentStage;

	/** @var TransportHandlingUnit[] */
	#[SerializedName('cac:TransportHandlingUnit')]
	public array $TransportHandlingUnit;

	/** @var FirstArrivalPortLocation */
	#[SerializedName('cac:FirstArrivalPortLocation')]
	public $FirstArrivalPortLocation;

	/** @var LastExitPortLocation */
	#[SerializedName('cac:LastExitPortLocation')]
	public $LastExitPortLocation;
}
