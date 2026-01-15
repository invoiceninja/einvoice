<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2024. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace InvoiceNinja\EInvoice\Writer;

use DOMElement;
use InvoiceNinja\EInvoice\Writer\Types\CacType;
use InvoiceNinja\EInvoice\Writer\Types\CbcType;
use InvoiceNinja\EInvoice\Writer\Types\ExtType;

class Peppol extends BaseStandard
{
    public string $prefix = "xsd";

    private ExtType $extType;
    private CacType $cacType;
    private CbcType $cbcType;
    
    //0 - do not show
    //1 - company level
    //2 - client level
    //4 - entity level

    public array $visibility = [
        'UBLExtensions' => 0,
        'UBLVersionID' => 0,
        'CustomizationID' => 0,
        'ProfileID' => 0,
        'ProfileExecutionID' => 0,
        'ID' => 0,
        'CopyIndicator' => 0,
        'UUID' => 0,
        'IssueDate' => 0,
        'IssueTime' => 0,
        'DueDate' => 0,
        'InvoiceTypeCode' => 4,
        'Note' => 4,
        'TaxPointDate' => 4,
        'DocumentCurrencyCode' => 0,
        'TaxCurrencyCode' => 0,
        'PricingCurrencyCode' => 0,
        'PaymentCurrencyCode' => 0,
        'PaymentAlternativeCurrencyCode' => 0,
        'AccountingCostCode' => 7,
        'AccountingCost' => 7,
        'LineCountNumeric' => 0,
        'BuyerReference' => 6,
        'InvoicePeriod' => 4,
        'OrderReference' => 4,
        'BillingReference' => 4,
        'DespatchDocumentReference' => 0,
        'ReceiptDocumentReference' => 0,
        'StatementDocumentReference' => 0,
        'OriginatorDocumentReference' => 0,
        'ContractDocumentReference' => 0,
        'AdditionalDocumentReference' => 0,
        'ProjectReference' => 0,
        'Signature' => 0,
        'AccountingSupplierParty' => 1,
        'AccountingCustomerParty' => 2,
        'PayeeParty' => 1,
        'BuyerCustomerParty' => 2,
        'SellerSupplierParty' => 1,
        'TaxRepresentativeParty' => 1,
        'Delivery' => 1,
        'DeliveryTerms' => 7,
        'PaymentMeans' => 7,
        'PaymentTerms' => 7,
        'PrepaidPayment' => 0,
        'AllowanceCharge' => 4,
        'TaxExchangeRate' => 0,
        'PricingExchangeRate' => 0,
        'PaymentExchangeRate' => 0,
        'PaymentAlternativeExchangeRate' => 0,
        'TaxTotal' => 0,
        'WithholdingTaxTotal' => 0,
        'LegalMonetaryTotal' => 0,
        'InvoiceLine' => 0,
    ];

    private array $type_tracker = [];

    public string $path = "src/Standards/FACT1/UBL-Invoice-2.1.xsd";

    public string $standard = "Peppol";

    public array $classMap = [
    'InvoicePeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\InvoicePeriod',
    'OrderReference' => 'InvoiceNinja\EInvoice\Models\Peppol\OrderReferenceType\OrderReference',
    'DocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReference',
    'Attachment' => 'InvoiceNinja\EInvoice\Models\Peppol\Attachment',
    'ExternalReference' => 'InvoiceNinja\EInvoice\Models\Peppol\ExternalReferenceType\ExternalReference',
    'ValidityPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\ValidityPeriod',
    'IssuerParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\IssuerParty',
    'PartyIdentification' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyIdentification',
    'PartyName' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyName',
    'Language' => 'InvoiceNinja\EInvoice\Models\Peppol\Language',
    'PostalAddress' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressType\PostalAddress',
    'AddressLine' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressLineType\AddressLine',
    'Country' => 'InvoiceNinja\EInvoice\Models\Peppol\Country',
    'LocationCoordinate' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationCoordinateType\LocationCoordinate',
    'PhysicalLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\PhysicalLocation',
    'Address' => 'InvoiceNinja\EInvoice\Models\Peppol\Address',
    'SubsidiaryLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\SubsidiaryLocation',
    'PartyTaxScheme' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyTaxScheme',
    'RegistrationAddress' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressType\RegistrationAddress',
    'TaxScheme' => 'InvoiceNinja\EInvoice\Models\Peppol\TaxScheme',
    'PartyLegalEntity' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyLegalEntityType\PartyLegalEntity',
    'CorporateStockAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\CorporateStockAmount',
    'CorporateRegistrationScheme' => 'InvoiceNinja\EInvoice\Models\Peppol\CorporateRegistrationSchemeType\CorporateRegistrationScheme',
    'HeadOfficeParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\HeadOfficeParty',
    'ShareholderParty' => 'InvoiceNinja\EInvoice\Models\Peppol\ShareholderPartyType\ShareholderParty',
    'Contact' => 'InvoiceNinja\EInvoice\Models\Peppol\Contact',
    'OtherCommunication' => 'InvoiceNinja\EInvoice\Models\Peppol\CommunicationType\OtherCommunication',
    'Person' => 'InvoiceNinja\EInvoice\Models\Peppol\PersonType\Person',
    'FinancialAccount' => 'InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType\FinancialAccount',
    'IdentityDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\IdentityDocumentReference',
    'ResidenceAddress' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressType\ResidenceAddress',
    'AgentParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\AgentParty',
    'ServiceProviderParty' => 'InvoiceNinja\EInvoice\Models\Peppol\ServiceProviderPartyType\ServiceProviderParty',
    'PowerOfAttorney' => 'InvoiceNinja\EInvoice\Models\Peppol\PowerOfAttorneyType\PowerOfAttorney',
    'Party' => 'InvoiceNinja\EInvoice\Models\Peppol\Party',
    'SellerContact' => 'InvoiceNinja\EInvoice\Models\Peppol\ContactType\SellerContact',
    'NotaryParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\NotaryParty',
    'WitnessParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\WitnessParty',
    'MandateDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\MandateDocumentReference',
    'FinancialInstitutionBranch' => 'InvoiceNinja\EInvoice\Models\Peppol\BranchType\FinancialInstitutionBranch',
    'ResultOfVerification' => 'InvoiceNinja\EInvoice\Models\Peppol\ResultOfVerificationType\ResultOfVerification',
    'SignatoryParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\SignatoryParty',
    'BillingReference' => 'InvoiceNinja\EInvoice\Models\Peppol\BillingReference',
    'InvoiceDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\InvoiceDocumentReference',
    'SelfBilledInvoiceDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\SelfBilledInvoiceDocumentReference',
    'CreditNoteDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\CreditNoteDocumentReference',
    'SelfBilledCreditNoteDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\SelfBilledCreditNoteDocumentReference',
    'DebitNoteDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DebitNoteDocumentReference',
    'ReminderDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ReminderDocumentReference',
    'AdditionalDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\AdditionalDocumentReference',
    'BillingReferenceLine' => 'InvoiceNinja\EInvoice\Models\Peppol\BillingReferenceLine',
    'Amount' => 'InvoiceNinja\EInvoice\Models\Peppol\Amount',
    'AllowanceCharge' => 'InvoiceNinja\EInvoice\Models\Peppol\AllowanceCharge',
    'BaseAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\BaseAmount',
    'PerUnitAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\PerUnitAmount',
    'TaxCategory' => 'InvoiceNinja\EInvoice\Models\Peppol\TaxCategoryType\TaxCategory',
    'TaxTotal' => 'InvoiceNinja\EInvoice\Models\Peppol\TaxTotal',
    'TaxAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\TaxAmount',
    'RoundingAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\RoundingAmount',
    'TaxSubtotal' => 'InvoiceNinja\EInvoice\Models\Peppol\TaxSubtotalType\TaxSubtotal',
    'PaymentMeans' => 'InvoiceNinja\EInvoice\Models\Peppol\PaymentMeansType\PaymentMeans',
    'CardAccount' => 'InvoiceNinja\EInvoice\Models\Peppol\CardAccountType\CardAccount',
    'PayerFinancialAccount' => 'InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType\PayerFinancialAccount',
    'PayeeFinancialAccount' => 'InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType\PayeeFinancialAccount',
    'CreditAccount' => 'InvoiceNinja\EInvoice\Models\Peppol\CreditAccount',
    'PaymentMandate' => 'InvoiceNinja\EInvoice\Models\Peppol\PaymentMandateType\PaymentMandate',
    'TradeFinancing' => 'InvoiceNinja\EInvoice\Models\Peppol\TradeFinancing',
    'DespatchDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DespatchDocumentReference',
    'JurisdictionRegionAddress' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressType\JurisdictionRegionAddress',
    'FinancialInstitution' => 'InvoiceNinja\EInvoice\Models\Peppol\FinancialInstitutionType\FinancialInstitution',
    'ReceiptDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ReceiptDocumentReference',
    'StatementDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\StatementDocumentReference',
    'OriginatorDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\OriginatorDocumentReference',
    'ContractDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ContractDocumentReference',
    'ProjectReference' => 'InvoiceNinja\EInvoice\Models\Peppol\ProjectReferenceType\ProjectReference',
    'WorkPhaseReference' => 'InvoiceNinja\EInvoice\Models\Peppol\WorkPhaseReferenceType\WorkPhaseReference',
    'WorkOrderDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\WorkOrderDocumentReference',
    'Signature' => 'InvoiceNinja\EInvoice\Models\Peppol\SignatureType\Signature',
    'DigitalSignatureAttachment' => 'InvoiceNinja\EInvoice\Models\Peppol\AttachmentType\DigitalSignatureAttachment',
    'OriginalDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\OriginalDocumentReference',
    'AccountingSupplierParty' => 'InvoiceNinja\EInvoice\Models\Peppol\SupplierPartyType\AccountingSupplierParty',
    'DespatchContact' => 'InvoiceNinja\EInvoice\Models\Peppol\ContactType\DespatchContact',
    'AccountingContact' => 'InvoiceNinja\EInvoice\Models\Peppol\ContactType\AccountingContact',
    'AccountingCustomerParty' => 'InvoiceNinja\EInvoice\Models\Peppol\CustomerPartyType\AccountingCustomerParty',
    'DeliveryContact' => 'InvoiceNinja\EInvoice\Models\Peppol\ContactType\DeliveryContact',
    'BuyerContact' => 'InvoiceNinja\EInvoice\Models\Peppol\ContactType\BuyerContact',
    'PayeeParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\PayeeParty',
    'BuyerCustomerParty' => 'InvoiceNinja\EInvoice\Models\Peppol\CustomerPartyType\BuyerCustomerParty',
    'SellerSupplierParty' => 'InvoiceNinja\EInvoice\Models\Peppol\SupplierPartyType\SellerSupplierParty',
    'TaxRepresentativeParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\TaxRepresentativeParty',
    'Delivery' => 'InvoiceNinja\EInvoice\Models\Peppol\Delivery',
    'Quantity' => 'InvoiceNinja\EInvoice\Models\Peppol\Quantity',
    'MinimumQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\MinimumQuantity',
    'MaximumQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\MaximumQuantity',
    'DeliveryAddress' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressType\DeliveryAddress',
    'DeliveryLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\DeliveryLocation',
    'AlternativeDeliveryLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\AlternativeDeliveryLocation',
    'RequestedDeliveryPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\RequestedDeliveryPeriod',
    'PromisedDeliveryPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\PromisedDeliveryPeriod',
    'EstimatedDeliveryPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\EstimatedDeliveryPeriod',
    'CarrierParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\CarrierParty',
    'DeliveryParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\DeliveryParty',
    'NotifyParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\NotifyParty',
    'Despatch' => 'InvoiceNinja\EInvoice\Models\Peppol\Despatch',
    'DespatchAddress' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressType\DespatchAddress',
    'DespatchLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\DespatchLocation',
    'DespatchParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\DespatchParty',
    'EstimatedDespatchPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\EstimatedDespatchPeriod',
    'RequestedDespatchPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\RequestedDespatchPeriod',
    'DeliveryTerms' => 'InvoiceNinja\EInvoice\Models\Peppol\DeliveryTerms',
    'MinimumDeliveryUnit' => 'InvoiceNinja\EInvoice\Models\Peppol\DeliveryUnitType\MinimumDeliveryUnit',
    'BatchQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\BatchQuantity',
    'ConsumerUnitQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ConsumerUnitQuantity',
    'MaximumDeliveryUnit' => 'InvoiceNinja\EInvoice\Models\Peppol\DeliveryUnitType\MaximumDeliveryUnit',
    'Shipment' => 'InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\Shipment',
    'TotalGoodsItemQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalGoodsItemQuantity',
    'TotalTransportHandlingUnitQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalTransportHandlingUnitQuantity',
    'InsuranceValueAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\InsuranceValueAmount',
    'DeclaredCustomsValueAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredCustomsValueAmount',
    'DeclaredForCarriageValueAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredForCarriageValueAmount',
    'DeclaredStatisticsValueAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\DeclaredStatisticsValueAmount',
    'FreeOnBoardValueAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\FreeOnBoardValueAmount',
    'ConsignmentQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ConsignmentQuantity',
    'Consignment' => 'InvoiceNinja\EInvoice\Models\Peppol\ConsignmentType\Consignment',
    'TotalInvoiceAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\TotalInvoiceAmount',
    'InsurancePremiumAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\InsurancePremiumAmount',
    'ChildConsignmentQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ChildConsignmentQuantity',
    'TotalPackagesQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalPackagesQuantity',
    'ConsolidatedShipment' => 'InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\ConsolidatedShipment',
    'GoodsItem' => 'InvoiceNinja\EInvoice\Models\Peppol\GoodsItem',
    'ShipmentStage' => 'InvoiceNinja\EInvoice\Models\Peppol\ShipmentStageType\ShipmentStage',
    'TransportHandlingUnit' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportHandlingUnit',
    'ReturnAddress' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressType\ReturnAddress',
    'OriginAddress' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressType\OriginAddress',
    'FirstArrivalPortLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\FirstArrivalPortLocation',
    'LastExitPortLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\LastExitPortLocation',
    'ExportCountry' => 'InvoiceNinja\EInvoice\Models\Peppol\CountryType\ExportCountry',
    'FreightAllowanceCharge' => 'InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\FreightAllowanceCharge',
    'CustomsDeclaration' => 'InvoiceNinja\EInvoice\Models\Peppol\CustomsDeclarationType\CustomsDeclaration',
    'RequestedPickupTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\RequestedPickupTransportEvent',
    'ReportedShipment' => 'InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\ReportedShipment',
    'CurrentStatus' => 'InvoiceNinja\EInvoice\Models\Peppol\StatusType\CurrentStatus',
    'Location' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\Location',
    'Period' => 'InvoiceNinja\EInvoice\Models\Peppol\Period',
    'RequestedDeliveryTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\RequestedDeliveryTransportEvent',
    'PlannedPickupTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PlannedPickupTransportEvent',
    'PlannedDeliveryTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PlannedDeliveryTransportEvent',
    'Status' => 'InvoiceNinja\EInvoice\Models\Peppol\StatusType\Status',
    'Condition' => 'InvoiceNinja\EInvoice\Models\Peppol\Condition',
    'ChildConsignment' => 'InvoiceNinja\EInvoice\Models\Peppol\ConsignmentType\ChildConsignment',
    'ConsigneeParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\ConsigneeParty',
    'ExporterParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\ExporterParty',
    'ConsignorParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\ConsignorParty',
    'ImporterParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\ImporterParty',
    'FreightForwarderParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\FreightForwarderParty',
    'OriginalDespatchParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\OriginalDespatchParty',
    'FinalDeliveryParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\FinalDeliveryParty',
    'PerformingCarrierParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\PerformingCarrierParty',
    'SubstituteCarrierParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\SubstituteCarrierParty',
    'LogisticsOperatorParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\LogisticsOperatorParty',
    'TransportAdvisorParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\TransportAdvisorParty',
    'HazardousItemNotificationParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\HazardousItemNotificationParty',
    'InsuranceParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\InsuranceParty',
    'MortgageHolderParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\MortgageHolderParty',
    'BillOfLadingHolderParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\BillOfLadingHolderParty',
    'OriginalDepartureCountry' => 'InvoiceNinja\EInvoice\Models\Peppol\CountryType\OriginalDepartureCountry',
    'FinalDestinationCountry' => 'InvoiceNinja\EInvoice\Models\Peppol\CountryType\FinalDestinationCountry',
    'TransitCountry' => 'InvoiceNinja\EInvoice\Models\Peppol\CountryType\TransitCountry',
    'TransportContract' => 'InvoiceNinja\EInvoice\Models\Peppol\ContractType\TransportContract',
    'TransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEvent',
    'OriginalDespatchTransportationService' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportationServiceType\OriginalDespatchTransportationService',
    'FinalDeliveryTransportationService' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportationServiceType\FinalDeliveryTransportationService',
    'PaymentTerms' => 'InvoiceNinja\EInvoice\Models\Peppol\PaymentTerms',
    'CollectPaymentTerms' => 'InvoiceNinja\EInvoice\Models\Peppol\PaymentTermsType\CollectPaymentTerms',
    'DisbursementPaymentTerms' => 'InvoiceNinja\EInvoice\Models\Peppol\PaymentTermsType\DisbursementPaymentTerms',
    'PrepaidPaymentTerms' => 'InvoiceNinja\EInvoice\Models\Peppol\PaymentTermsType\PrepaidPaymentTerms',
    'ExtraAllowanceCharge' => 'InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\ExtraAllowanceCharge',
    'MainCarriageShipmentStage' => 'InvoiceNinja\EInvoice\Models\Peppol\ShipmentStageType\MainCarriageShipmentStage',
    'PreCarriageShipmentStage' => 'InvoiceNinja\EInvoice\Models\Peppol\ShipmentStageType\PreCarriageShipmentStage',
    'OnCarriageShipmentStage' => 'InvoiceNinja\EInvoice\Models\Peppol\ShipmentStageType\OnCarriageShipmentStage',
    'NominationPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\NominationPeriod',
    'ContractualDelivery' => 'InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\ContractualDelivery',
    'TransportEquipment' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEquipment',
    'SupportedTransportEquipment' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\SupportedTransportEquipment',
    'UnsupportedTransportEquipment' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\UnsupportedTransportEquipment',
    'CommodityClassification' => 'InvoiceNinja\EInvoice\Models\Peppol\CommodityClassificationType\CommodityClassification',
    'SupportedCommodityClassification' => 'InvoiceNinja\EInvoice\Models\Peppol\CommodityClassificationType\SupportedCommodityClassification',
    'UnsupportedCommodityClassification' => 'InvoiceNinja\EInvoice\Models\Peppol\CommodityClassificationType\UnsupportedCommodityClassification',
    'TotalCapacityDimension' => 'InvoiceNinja\EInvoice\Models\Peppol\DimensionType\TotalCapacityDimension',
    'ResponsibleTransportServiceProviderParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\ResponsibleTransportServiceProviderParty',
    'EnvironmentalEmission' => 'InvoiceNinja\EInvoice\Models\Peppol\EnvironmentalEmission',
    'EstimatedDurationPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\EstimatedDurationPeriod',
    'ScheduledServiceFrequency' => 'InvoiceNinja\EInvoice\Models\Peppol\ServiceFrequencyType\ScheduledServiceFrequency',
    'SettlementDiscountAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\SettlementDiscountAmount',
    'PenaltyAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\PenaltyAmount',
    'SettlementPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\SettlementPeriod',
    'PenaltyPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\PenaltyPeriod',
    'ExchangeRate' => 'InvoiceNinja\EInvoice\Models\Peppol\ExchangeRateType\ExchangeRate',
    'CrewQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\CrewQuantity',
    'PassengerQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\PassengerQuantity',
    'TransitPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\TransitPeriod',
    'TransportMeans' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportMeansType\TransportMeans',
    'LoadingPortLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\LoadingPortLocation',
    'UnloadingPortLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\UnloadingPortLocation',
    'TransshipPortLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\TransshipPortLocation',
    'LoadingTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\LoadingTransportEvent',
    'ExaminationTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ExaminationTransportEvent',
    'AvailabilityTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\AvailabilityTransportEvent',
    'ExportationTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ExportationTransportEvent',
    'DischargeTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\DischargeTransportEvent',
    'WarehousingTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\WarehousingTransportEvent',
    'TakeoverTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\TakeoverTransportEvent',
    'OptionalTakeoverTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\OptionalTakeoverTransportEvent',
    'DropoffTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\DropoffTransportEvent',
    'ActualPickupTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ActualPickupTransportEvent',
    'DeliveryTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\DeliveryTransportEvent',
    'ReceiptTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ReceiptTransportEvent',
    'StorageTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\StorageTransportEvent',
    'AcceptanceTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\AcceptanceTransportEvent',
    'TerminalOperatorParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\TerminalOperatorParty',
    'CustomsAgentParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\CustomsAgentParty',
    'EstimatedTransitPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\EstimatedTransitPeriod',
    'FreightChargeLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\FreightChargeLocation',
    'DetentionTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\DetentionTransportEvent',
    'RequestedDepartureTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\RequestedDepartureTransportEvent',
    'RequestedArrivalTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\RequestedArrivalTransportEvent',
    'RequestedWaypointTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\RequestedWaypointTransportEvent',
    'PlannedDepartureTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PlannedDepartureTransportEvent',
    'PlannedArrivalTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PlannedArrivalTransportEvent',
    'PlannedWaypointTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PlannedWaypointTransportEvent',
    'ActualDepartureTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ActualDepartureTransportEvent',
    'ActualWaypointTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ActualWaypointTransportEvent',
    'ActualArrivalTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\ActualArrivalTransportEvent',
    'EstimatedDepartureTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\EstimatedDepartureTransportEvent',
    'EstimatedArrivalTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\EstimatedArrivalTransportEvent',
    'PassengerPerson' => 'InvoiceNinja\EInvoice\Models\Peppol\PersonType\PassengerPerson',
    'DriverPerson' => 'InvoiceNinja\EInvoice\Models\Peppol\PersonType\DriverPerson',
    'ReportingPerson' => 'InvoiceNinja\EInvoice\Models\Peppol\PersonType\ReportingPerson',
    'CrewMemberPerson' => 'InvoiceNinja\EInvoice\Models\Peppol\PersonType\CrewMemberPerson',
    'SecurityOfficerPerson' => 'InvoiceNinja\EInvoice\Models\Peppol\PersonType\SecurityOfficerPerson',
    'MasterPerson' => 'InvoiceNinja\EInvoice\Models\Peppol\PersonType\MasterPerson',
    'ShipsSurgeonPerson' => 'InvoiceNinja\EInvoice\Models\Peppol\PersonType\ShipsSurgeonPerson',
    'TotalPackageQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\TotalPackageQuantity',
    'HandlingUnitDespatchLine' => 'InvoiceNinja\EInvoice\Models\Peppol\DespatchLineType\HandlingUnitDespatchLine',
    'ActualPackage' => 'InvoiceNinja\EInvoice\Models\Peppol\PackageType\ActualPackage',
    'ReceivedHandlingUnitReceiptLine' => 'InvoiceNinja\EInvoice\Models\Peppol\ReceiptLineType\ReceivedHandlingUnitReceiptLine',
    'HazardousGoodsTransit' => 'InvoiceNinja\EInvoice\Models\Peppol\HazardousGoodsTransitType\HazardousGoodsTransit',
    'MeasurementDimension' => 'InvoiceNinja\EInvoice\Models\Peppol\DimensionType\MeasurementDimension',
    'MinimumTemperature' => 'InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MinimumTemperature',
    'MaximumTemperature' => 'InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MaximumTemperature',
    'FloorSpaceMeasurementDimension' => 'InvoiceNinja\EInvoice\Models\Peppol\DimensionType\FloorSpaceMeasurementDimension',
    'PalletSpaceMeasurementDimension' => 'InvoiceNinja\EInvoice\Models\Peppol\DimensionType\PalletSpaceMeasurementDimension',
    'ShipmentDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ShipmentDocumentReference',
    'ReferencedShipment' => 'InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\ReferencedShipment',
    'Package' => 'InvoiceNinja\EInvoice\Models\Peppol\PackageType\Package',
    'ValueAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\ValueAmount',
    'CustomsTariffQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\CustomsTariffQuantity',
    'ChargeableQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ChargeableQuantity',
    'ReturnableQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ReturnableQuantity',
    'Item' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemType\Item',
    'PackQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\PackQuantity',
    'BuyersItemIdentification' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemIdentificationType\BuyersItemIdentification',
    'SellersItemIdentification' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemIdentificationType\SellersItemIdentification',
    'ManufacturersItemIdentification' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemIdentificationType\ManufacturersItemIdentification',
    'StandardItemIdentification' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemIdentificationType\StandardItemIdentification',
    'CatalogueItemIdentification' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemIdentificationType\CatalogueItemIdentification',
    'AdditionalItemIdentification' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemIdentificationType\AdditionalItemIdentification',
    'CatalogueDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\CatalogueDocumentReference',
    'ItemSpecificationDocumentReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ItemSpecificationDocumentReference',
    'OriginCountry' => 'InvoiceNinja\EInvoice\Models\Peppol\CountryType\OriginCountry',
    'TransactionConditions' => 'InvoiceNinja\EInvoice\Models\Peppol\TransactionConditionsType\TransactionConditions',
    'HazardousItem' => 'InvoiceNinja\EInvoice\Models\Peppol\HazardousItemType\HazardousItem',
    'ClassifiedTaxCategory' => 'InvoiceNinja\EInvoice\Models\Peppol\TaxCategoryType\ClassifiedTaxCategory',
    'AdditionalItemProperty' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemPropertyType\AdditionalItemProperty',
    'ManufacturerParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\ManufacturerParty',
    'InformationContentProviderParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\InformationContentProviderParty',
    'ItemInstance' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemInstanceType\ItemInstance',
    'Certificate' => 'InvoiceNinja\EInvoice\Models\Peppol\CertificateType\Certificate',
    'Dimension' => 'InvoiceNinja\EInvoice\Models\Peppol\Dimension',
    'GoodsItemContainer' => 'InvoiceNinja\EInvoice\Models\Peppol\GoodsItemContainerType\GoodsItemContainer',
    'InvoiceLine' => 'InvoiceNinja\EInvoice\Models\Peppol\InvoiceLine',
    'CreditNote' => 'InvoiceNinja\EInvoice\Models\Peppol\CreditNote',
    'CreditNoteLine' => 'InvoiceNinja\EInvoice\Models\Peppol\CreditNoteLine',
    'InvoicedQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\InvoicedQuantity',
    'CreditedQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\CreditedQuantity',
    'LineExtensionAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\LineExtensionAmount',
    'OrderLineReference' => 'InvoiceNinja\EInvoice\Models\Peppol\OrderLineReferenceType\OrderLineReference',
    'DespatchLineReference' => 'InvoiceNinja\EInvoice\Models\Peppol\LineReferenceType\DespatchLineReference',
    'ReceiptLineReference' => 'InvoiceNinja\EInvoice\Models\Peppol\LineReferenceType\ReceiptLineReference',
    'PricingReference' => 'InvoiceNinja\EInvoice\Models\Peppol\PricingReferenceType\PricingReference',
    'OriginatorParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\OriginatorParty',
    'WithholdingTaxTotal' => 'InvoiceNinja\EInvoice\Models\Peppol\TaxTotalType\WithholdingTaxTotal',
    'Price' => 'InvoiceNinja\EInvoice\Models\Peppol\Price',
    'SubInvoiceLine' => 'InvoiceNinja\EInvoice\Models\Peppol\InvoiceLineType\SubInvoiceLine',
    'ItemPriceExtension' => 'InvoiceNinja\EInvoice\Models\Peppol\PriceExtensionType\ItemPriceExtension',
    'Temperature' => 'InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\Temperature',
    'ContainedGoodsItem' => 'InvoiceNinja\EInvoice\Models\Peppol\GoodsItemType\ContainedGoodsItem',
    'Pickup' => 'InvoiceNinja\EInvoice\Models\Peppol\PickupType\Pickup',
    'ContainingPackage' => 'InvoiceNinja\EInvoice\Models\Peppol\PackageType\ContainingPackage',
    'PickupLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\PickupLocation',
    'PickupParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\PickupParty',
    'ContainedPackage' => 'InvoiceNinja\EInvoice\Models\Peppol\PackageType\ContainedPackage',
    'ContainingTransportEquipment' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\ContainingTransportEquipment',
    'DeliveryUnit' => 'InvoiceNinja\EInvoice\Models\Peppol\DeliveryUnit',
    'Stowage' => 'InvoiceNinja\EInvoice\Models\Peppol\StowageType\Stowage',
    'AirTransport' => 'InvoiceNinja\EInvoice\Models\Peppol\AirTransport',
    'RoadTransport' => 'InvoiceNinja\EInvoice\Models\Peppol\RoadTransport',
    'RailTransport' => 'InvoiceNinja\EInvoice\Models\Peppol\RailTransportType\RailTransport',
    'MaritimeTransport' => 'InvoiceNinja\EInvoice\Models\Peppol\MaritimeTransportType\MaritimeTransport',
    'OwnerParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\OwnerParty',
    'EndPointID' => 'InvoiceNinja\EInvoice\Models\Peppol\EndpointIDType',
    'DeliveredQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\DeliveredQuantity',
    'BackorderQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\BackorderQuantity',
    'OutstandingQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\OutstandingQuantity',
    'OversupplyQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\OversupplyQuantity',
    'ReceivedQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ReceivedQuantity',
    'ShortQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ShortQuantity',
    'RejectedQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\RejectedQuantity',
    'TransportEquipmentSeal' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentSealType\TransportEquipmentSeal',
    'ProviderParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\ProviderParty',
    'LoadingProofParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\LoadingProofParty',
    'SupplierParty' => 'InvoiceNinja\EInvoice\Models\Peppol\SupplierPartyType\SupplierParty',
    'OperatingParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\OperatingParty',
    'LoadingLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\LoadingLocation',
    'UnloadingLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\UnloadingLocation',
    'StorageLocation' => 'InvoiceNinja\EInvoice\Models\Peppol\LocationType\StorageLocation',
    'PositioningTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PositioningTransportEvent',
    'QuarantineTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\QuarantineTransportEvent',
    'PickupTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\PickupTransportEvent',
    'HandlingTransportEvent' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\HandlingTransportEvent',
    'ApplicableTransportMeans' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportMeansType\ApplicableTransportMeans',
    'HaulageTradingTerms' => 'InvoiceNinja\EInvoice\Models\Peppol\TradingTermsType\HaulageTradingTerms',
    'PackagedTransportHandlingUnit' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportHandlingUnitType\PackagedTransportHandlingUnit',
    'ServiceAllowanceCharge' => 'InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\ServiceAllowanceCharge',
    'AttachedTransportEquipment' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\AttachedTransportEquipment',
    'ContainedInTransportEquipment' => 'InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\ContainedInTransportEquipment',
    'TaxableAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\TaxableAmount',
    'TransactionCurrencyTaxAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\TransactionCurrencyTaxAmount',
    'MaximumPaidAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\MaximumPaidAmount',
    'PayerParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\PayerParty',
    'PaymentReversalPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\PaymentReversalPeriod',
    'Clause' => 'InvoiceNinja\EInvoice\Models\Peppol\Clause',
    'FinancingParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\FinancingParty',
    'FinancingFinancialAccount' => 'InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType\FinancingFinancialAccount',
    'ForeignExchangeContract' => 'InvoiceNinja\EInvoice\Models\Peppol\ContractType\ForeignExchangeContract',
    'PrepaidPayment' => 'InvoiceNinja\EInvoice\Models\Peppol\PaymentType\PrepaidPayment',
    'PaidAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\PaidAmount',
    'TaxExchangeRate' => 'InvoiceNinja\EInvoice\Models\Peppol\ExchangeRateType\TaxExchangeRate',
    'PricingExchangeRate' => 'InvoiceNinja\EInvoice\Models\Peppol\ExchangeRateType\PricingExchangeRate',
    'PaymentExchangeRate' => 'InvoiceNinja\EInvoice\Models\Peppol\ExchangeRateType\PaymentExchangeRate',
    'PaymentAlternativeExchangeRate' => 'InvoiceNinja\EInvoice\Models\Peppol\ExchangeRateType\PaymentAlternativeExchangeRate',
    'LegalMonetaryTotal' => 'InvoiceNinja\EInvoice\Models\Peppol\MonetaryTotalType\LegalMonetaryTotal',
    'TaxExclusiveAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\TaxExclusiveAmount',
    'TaxInclusiveAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\TaxInclusiveAmount',
    'AllowanceTotalAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\AllowanceTotalAmount',
    'ChargeTotalAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\ChargeTotalAmount',
    'PrepaidAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\PrepaidAmount',
    'PayableRoundingAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\PayableRoundingAmount',
    'PayableAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\PayableAmount',
    'PayableAlternativeAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\PayableAlternativeAmount',
    'OriginalItemLocationQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemLocationQuantityType\OriginalItemLocationQuantity',
    'ApplicableTerritoryAddress' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressType\ApplicableTerritoryAddress',
    'PriceAmount' => 'InvoiceNinja\EInvoice\Models\Peppol\AmountType\PriceAmount',
    'BaseQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\BaseQuantity',
    'PriceList' => 'InvoiceNinja\EInvoice\Models\Peppol\PriceListType\PriceList',
    'ApplicableTaxCategory' => 'InvoiceNinja\EInvoice\Models\Peppol\TaxCategoryType\ApplicableTaxCategory',
    'DependentPriceReference' => 'InvoiceNinja\EInvoice\Models\Peppol\DependentPriceReferenceType\DependentPriceReference',
    'LocationAddress' => 'InvoiceNinja\EInvoice\Models\Peppol\AddressType\LocationAddress',
    'DependentLineReference' => 'InvoiceNinja\EInvoice\Models\Peppol\LineReferenceType\DependentLineReference',
    'AlternativeConditionPrice' => 'InvoiceNinja\EInvoice\Models\Peppol\PriceType\AlternativeConditionPrice',
    'PreviousPriceList' => 'InvoiceNinja\EInvoice\Models\Peppol\PriceListType\PreviousPriceList',
    'PhysicalAttribute' => 'InvoiceNinja\EInvoice\Models\Peppol\PhysicalAttribute',
    'ContactParty' => 'InvoiceNinja\EInvoice\Models\Peppol\PartyType\ContactParty',
    'SecondaryHazard' => 'InvoiceNinja\EInvoice\Models\Peppol\SecondaryHazardType\SecondaryHazard',
    'EmergencyTemperature' => 'InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\EmergencyTemperature',
    'FlashpointTemperature' => 'InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\FlashpointTemperature',
    'AdditionalTemperature' => 'InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\AdditionalTemperature',
    'ValueQuantity' => 'InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ValueQuantity',
    'UsabilityPeriod' => 'InvoiceNinja\EInvoice\Models\Peppol\PeriodType\UsabilityPeriod',
    'ItemPropertyGroup' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemPropertyGroup',
    'RangeDimension' => 'InvoiceNinja\EInvoice\Models\Peppol\DimensionType\RangeDimension',
    'ItemPropertyRange' => 'InvoiceNinja\EInvoice\Models\Peppol\ItemPropertyRangeType\ItemPropertyRange',
    'LotIdentification' => 'InvoiceNinja\EInvoice\Models\Peppol\LotIdentificationType\LotIdentification',
    'CreditNoteTypeCode' => 'InvoiceNinja\EInvoice\Models\Peppol\CodeType\CreditNoteTypeCode',
    ];

    /** @var array $exclusion_nodes - array of nodes to exclude from the output*/
    private array $exclusion_nodes = [
        'ext:UBLExtensions',
    ];

    public function __construct()
    {

    }

    public function init(): self
    {

        $this->cbcType = new CbcType();
        $this->extType = new ExtType();
        $this->cacType = new CacType();

        $this->document = new \DomDocument();
        $this->document->load($this->path);

        $this->parentProps()
        ->childNodes()
        ->childTypes()
        ->write();

        return $this;

    }

    public function parentProps(): self
    {

        $elements = $this->document->getElementsByTagName('element');

        $parent_elements = [];

        foreach($elements as $element) {

            if(!$element->hasAttribute('ref') || in_array($element->getAttribute('ref'), $this->exclusion_nodes)) {
                continue;
            }

            $parts = explode(":", $element->getAttribute('ref'));

            $maxOccurs = $element->getAttribute('maxOccurs');

            if($maxOccurs == "unbounded") {
                $maxOccurs = "-1";
            }


            if(isset($this->visibility[$parts[1]]) && $this->visibility[$parts[1]] == 0) {
                $visibility = 0;
            } else {
                $visibility = $this->getVisibility($parts[1]);
            }


            $parent_elements[$parts[1]] = array_merge($this->stub_validation, [
                'name' => $parts[1],
                'base_type' => $element->getAttribute('ref'),
                'min_occurs' => (int)$element->getAttribute('minOccurs'),
                'max_occurs' => (int)$maxOccurs,
                'help' => $this->getAnnotation($element),
                'namespace' => $parts[0],
                'visibility' => $visibility,
            ]);

        }

        $this->data['InvoiceType'] = [
            'type' => 'InvoiceType',
            'help' => '',
            'choices' => [],
            'elements' => $parent_elements
        ];

        return $this;
    }

    private function getVisibility(string $type): int
    {

        
        if(isset($this->visibility[$type])) {
            return 7;
        }

        foreach($this->visibility as $key => $value) {

            if(isset($this->visibility[$key][$type])) {
                return $this->visibility[$key][$type];
            }

        }

        return 0;


    }

    private function getAnnotation(DOMElement $element): string
    {
        $result = $this->getXPath("./{$this->prefix}:annotation//{$this->prefix}:documentation//ccts:Component//ccts:Definition", $element);

        return $result->count() > 0 ? trim(str_replace("\n", "", $result->item(0)->nodeValue)) : '';

    }

    private function getXPath(string $path, ?\DomElement $element = null): \DOMNodeList
    {
        $xpath = new \DOMXPath($this->document);
        return $xpath->query($path, $element);
    }

    private function childNodes(): self
    {
        foreach($this->data as $key => $elements) {

            foreach($elements['elements'] as $eKey => $element) {
                $this->data[$key]['elements'][$eKey] = array_merge($element, $this->harvestNode($element['base_type']));
            }
        }

        return $this;
    }

    /** Nested type props need to be harvested and resolved */
    private function childTypes(): self
    {
        $this->type_tracker[] = 'AmountType';
        $this->type_tracker[] = 'IdentifierType';
        $this->type_tracker[] = 'CodeType';
        $this->type_tracker[] = 'NumericType';
        $this->type_tracker[] = 'QuantityType';

        $element_collection = collect($this->cacType->elements);
        $cbc_collection = collect($this->cbcType->elements);

        $type_map = collect($this->data)
        ->map(function ($type) {

            return collect($type['elements'])
            ->filter(function ($element) {
                return stripos($element['base_type'], 'Type') !== false && !in_array($element['base_type'], $this->type_tracker);
            })
            ->map(function ($element) {
                $this->type_tracker[] = $element['base_type'];
                return $element['base_type'];
            })
            ->flatten();

        })->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;

            return $this->cacType->typesForType($type)->merge($this->cbcType->typesForType($type));
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type)->merge($this->cbcType->typesForType($type));
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type)->merge($this->cbcType->typesForType($type));
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type)->merge($this->cbcType->typesForType($type));
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type)->merge($this->cbcType->typesForType($type));
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {        

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type)->merge($this->cbcType->typesForType($type));
        })
        ->flatten()
        ->unique();

        collect($this->type_tracker)
        ->unique()
        ->each(function ($type) use ($element_collection, $cbc_collection) {

            // if(in_array($type, ['CalculationMethodCodeType','CalculationMethodCode']))
            //     echo $type.PHP_EOL;

            $type_array = $element_collection->where('type', $type)->first();

            if(!$type_array){
                $type_array = $cbc_collection->where('type', $type)->first();
            }

            $type_array['visibility'] = $this->getVisibility($type);

            $new_set = [];

            if(!isset($type_array['elements'])){
                echo $type;
                // echo print_r($type_array).PHP_EOL;
            }

            foreach($type_array['elements'] as $stub) {
                $stub['visibility'] = $this->getVisibility($stub['name']);
                $new_set[$stub['name']] = $stub;
            }
            $type_array['elements'] = $new_set;
            
            $this->data[$type_array['type']] = (object)$type_array;


        });

        return $this;
    }


    private function harvestNode(string $name)
    {
        $parts = explode(":", $name);
        $type = $this->cbcType;

        match($parts[0]) {
            'cac' => $type = $this->cacType,
            'cbc' => $type = $this->cbcType,
            'ext' => $type = $this->extType,
            default => $type = $this->cbcType,
        };

        return $type->getNamedType($parts[1]);

    }


}
