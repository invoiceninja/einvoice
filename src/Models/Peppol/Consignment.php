<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\ExtraAllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\FreightAllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredCustomsValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredForCarriageValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredStatisticsValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\FreeOnBoardValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\InsurancePremiumAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\InsuranceValueAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\TotalInvoiceAmount;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\HandlingCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ShippingPriorityLevelCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TariffCode;
use InvoiceNinja\EInvoice\Models\Peppol\ConsignmentType\ChildConsignment;
use InvoiceNinja\EInvoice\Models\Peppol\ContractType\TransportContract;
use InvoiceNinja\EInvoice\Models\Peppol\CountryType\FinalDestinationCountry;
use InvoiceNinja\EInvoice\Models\Peppol\CountryType\OriginalDepartureCountry;
use InvoiceNinja\EInvoice\Models\Peppol\CountryType\TransitCountry;
use InvoiceNinja\EInvoice\Models\Peppol\CustomsDeclarationType\CustomsDeclaration;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryTermsType\DeliveryTerms;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\BrokerAssignedID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\CarrierAssignedID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ConsigneeAssignedID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ConsignorAssignedID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ContractedCarrierAssignedID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\FreightForwarderAssignedID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\LoadingSequenceID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\PerformingCarrierAssignedID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\SequenceID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\FirstArrivalPortLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\LastExitPortLocation;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\ChargeableWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\GrossVolumeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\GrossWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\LoadingLengthMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\NetNetWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\NetVolumeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\NetWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\BillOfLadingHolderParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\CarrierParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\ConsigneeParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\ConsignorParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\ExporterParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\FinalDeliveryParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\FreightForwarderParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\HazardousItemNotificationParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\ImporterParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\InsuranceParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\LogisticsOperatorParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\MortgageHolderParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\NotifyParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\OriginalDespatchParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\PerformingCarrierParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\SubstituteCarrierParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\TransportAdvisorParty;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentTermsType\CollectPaymentTerms;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentTermsType\DisbursementPaymentTerms;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentTermsType\PaymentTerms;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentTermsType\PrepaidPaymentTerms;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ChildConsignmentQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ConsignmentQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalGoodsItemQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalPackagesQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalTransportHandlingUnitQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentStageType\MainCarriageShipmentStage;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentStageType\OnCarriageShipmentStage;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentStageType\PreCarriageShipmentStage;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\ConsolidatedShipment;
use InvoiceNinja\EInvoice\Models\Peppol\StatusType\Status;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PlannedDeliveryTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PlannedPickupTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\RequestedDeliveryTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\RequestedPickupTransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\TransportEvent;
use InvoiceNinja\EInvoice\Models\Peppol\TransportHandlingUnitType\TransportHandlingUnit;
use InvoiceNinja\EInvoice\Models\Peppol\TransportationServiceType\FinalDeliveryTransportationService;
use InvoiceNinja\EInvoice\Models\Peppol\TransportationServiceType\OriginalDespatchTransportationService;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Consignment
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var CarrierAssignedID */
	#[SerializedName('cbc:CarrierAssignedID')]
	public $CarrierAssignedID;

	/** @var ConsigneeAssignedID */
	#[SerializedName('cbc:ConsigneeAssignedID')]
	public $ConsigneeAssignedID;

	/** @var ConsignorAssignedID */
	#[SerializedName('cbc:ConsignorAssignedID')]
	public $ConsignorAssignedID;

	/** @var FreightForwarderAssignedID */
	#[SerializedName('cbc:FreightForwarderAssignedID')]
	public $FreightForwarderAssignedID;

	/** @var BrokerAssignedID */
	#[SerializedName('cbc:BrokerAssignedID')]
	public $BrokerAssignedID;

	/** @var ContractedCarrierAssignedID */
	#[SerializedName('cbc:ContractedCarrierAssignedID')]
	public $ContractedCarrierAssignedID;

	/** @var PerformingCarrierAssignedID */
	#[SerializedName('cbc:PerformingCarrierAssignedID')]
	public $PerformingCarrierAssignedID;

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

	/** @var TariffCode */
	#[SerializedName('cbc:TariffCode')]
	public $TariffCode;

	/** @var InsurancePremiumAmount */
	#[SerializedName('cbc:InsurancePremiumAmount')]
	public $InsurancePremiumAmount;

	/** @var GrossWeightMeasure */
	#[SerializedName('cbc:GrossWeightMeasure')]
	public $GrossWeightMeasure;

	/** @var NetWeightMeasure */
	#[SerializedName('cbc:NetWeightMeasure')]
	public $NetWeightMeasure;

	/** @var NetNetWeightMeasure */
	#[SerializedName('cbc:NetNetWeightMeasure')]
	public $NetNetWeightMeasure;

	/** @var ChargeableWeightMeasure */
	#[SerializedName('cbc:ChargeableWeightMeasure')]
	public $ChargeableWeightMeasure;

	/** @var GrossVolumeMeasure */
	#[SerializedName('cbc:GrossVolumeMeasure')]
	public $GrossVolumeMeasure;

	/** @var NetVolumeMeasure */
	#[SerializedName('cbc:NetVolumeMeasure')]
	public $NetVolumeMeasure;

	/** @var LoadingLengthMeasure */
	#[SerializedName('cbc:LoadingLengthMeasure')]
	public $LoadingLengthMeasure;

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

	/** @var SequenceID */
	#[SerializedName('cbc:SequenceID')]
	public $SequenceID;

	/** @var ShippingPriorityLevelCode */
	#[SerializedName('cbc:ShippingPriorityLevelCode')]
	public $ShippingPriorityLevelCode;

	/** @var HandlingCode */
	#[SerializedName('cbc:HandlingCode')]
	public $HandlingCode;

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

	/** @var LoadingSequenceID */
	#[SerializedName('cbc:LoadingSequenceID')]
	public $LoadingSequenceID;

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
