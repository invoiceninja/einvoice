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

namespace Invoiceninja\Einvoice\Writer;

use DOMElement;
use Invoiceninja\Einvoice\Writer\Types\CacType;
use Invoiceninja\Einvoice\Writer\Types\CbcType;
use Invoiceninja\Einvoice\Writer\Types\ExtType;

class Peppol extends BaseStandard
{
    public string $prefix = "xsd";

    private ExtType $extType;
    private CacType $cacType;
    private CbcType $cbcType;

    private array $visibility = [
        'UBLExtensions' => 0,
        'UBLVersionID' => 0,
        'CustomizationID' => 0,
        'ProfileID' => 0,
        'ProfileExecutionID' => 0,
        'ID' => 4,
        'CopyIndicator' => 0,
        'UUID' => 0,
        'IssueDate' => 4,
        'IssueTime' => 4,
        'DueDate' => 4,
        'InvoiceTypeCode' => 4,
        'Note' => 4,
        'TaxPointDate' => 4,
        'DocumentCurrencyCode' => 7,
        'TaxCurrencyCode' => 7,
        'PricingCurrencyCode' => 7,
        'PaymentCurrencyCode' => 7,
        'PaymentAlternativeCurrencyCode' => 7,
        'AccountingCostCode' => 2,
        'AccountingCost' => 2,
        'LineCountNumeric' => 0,
        'BuyerReference' => 2,
        'InvoicePeriod' => 4,
        'OrderReference' => 4,
        'BillingReference' => 4,
        'DespatchDocumentReference' => 4,
        'ReceiptDocumentReference' => 4,
        'StatementDocumentReference' => 4,
        'OriginatorDocumentReference' => 4,
        'ContractDocumentReference' => 4,
        'AdditionalDocumentReference' => 4,
        'ProjectReference' => 4,
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
        'PrepaidPayment' => 4,
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
    'InvoicePeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\InvoicePeriod',
    'OrderReference' => 'Invoiceninja\Einvoice\Models\Peppol\OrderReferenceType\OrderReference',
    'DocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReference',
    'Attachment' => 'Invoiceninja\Einvoice\Models\Peppol\Attachment',
    'ExternalReference' => 'Invoiceninja\Einvoice\Models\Peppol\ExternalReferenceType\ExternalReference',
    'ValidityPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\ValidityPeriod',
    'IssuerParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\IssuerParty',
    'PartyIdentification' => 'Invoiceninja\Einvoice\Models\Peppol\PartyIdentification',
    'PartyName' => 'Invoiceninja\Einvoice\Models\Peppol\PartyName',
    'Language' => 'Invoiceninja\Einvoice\Models\Peppol\Language',
    'PostalAddress' => 'Invoiceninja\Einvoice\Models\Peppol\AddressType\PostalAddress',
    'AddressLine' => 'Invoiceninja\Einvoice\Models\Peppol\AddressLineType\AddressLine',
    'Country' => 'Invoiceninja\Einvoice\Models\Peppol\Country',
    'LocationCoordinate' => 'Invoiceninja\Einvoice\Models\Peppol\LocationCoordinateType\LocationCoordinate',
    'PhysicalLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\PhysicalLocation',
    'Address' => 'Invoiceninja\Einvoice\Models\Peppol\Address',
    'SubsidiaryLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\SubsidiaryLocation',
    'PartyTaxScheme' => 'Invoiceninja\Einvoice\Models\Peppol\PartyTaxScheme',
    'RegistrationAddress' => 'Invoiceninja\Einvoice\Models\Peppol\AddressType\RegistrationAddress',
    'TaxScheme' => 'Invoiceninja\Einvoice\Models\Peppol\TaxScheme',
    'PartyLegalEntity' => 'Invoiceninja\Einvoice\Models\Peppol\PartyLegalEntityType\PartyLegalEntity',
    'CorporateStockAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\CorporateStockAmount',
    'CorporateRegistrationScheme' => 'Invoiceninja\Einvoice\Models\Peppol\CorporateRegistrationSchemeType\CorporateRegistrationScheme',
    'HeadOfficeParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\HeadOfficeParty',
    'ShareholderParty' => 'Invoiceninja\Einvoice\Models\Peppol\ShareholderPartyType\ShareholderParty',
    'Contact' => 'Invoiceninja\Einvoice\Models\Peppol\Contact',
    'OtherCommunication' => 'Invoiceninja\Einvoice\Models\Peppol\CommunicationType\OtherCommunication',
    'Person' => 'Invoiceninja\Einvoice\Models\Peppol\PersonType\Person',
    'FinancialAccount' => 'Invoiceninja\Einvoice\Models\Peppol\FinancialAccountType\FinancialAccount',
    'IdentityDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\IdentityDocumentReference',
    'ResidenceAddress' => 'Invoiceninja\Einvoice\Models\Peppol\AddressType\ResidenceAddress',
    'AgentParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\AgentParty',
    'ServiceProviderParty' => 'Invoiceninja\Einvoice\Models\Peppol\ServiceProviderPartyType\ServiceProviderParty',
    'PowerOfAttorney' => 'Invoiceninja\Einvoice\Models\Peppol\PowerOfAttorneyType\PowerOfAttorney',
    'Party' => 'Invoiceninja\Einvoice\Models\Peppol\Party',
    'SellerContact' => 'Invoiceninja\Einvoice\Models\Peppol\ContactType\SellerContact',
    'NotaryParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\NotaryParty',
    'WitnessParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\WitnessParty',
    'MandateDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\MandateDocumentReference',
    'FinancialInstitutionBranch' => 'Invoiceninja\Einvoice\Models\Peppol\BranchType\FinancialInstitutionBranch',
    'ResultOfVerification' => 'Invoiceninja\Einvoice\Models\Peppol\ResultOfVerificationType\ResultOfVerification',
    'SignatoryParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\SignatoryParty',
    'BillingReference' => 'Invoiceninja\Einvoice\Models\Peppol\BillingReference',
    'InvoiceDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\InvoiceDocumentReference',
    'SelfBilledInvoiceDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\SelfBilledInvoiceDocumentReference',
    'CreditNoteDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\CreditNoteDocumentReference',
    'SelfBilledCreditNoteDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\SelfBilledCreditNoteDocumentReference',
    'DebitNoteDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\DebitNoteDocumentReference',
    'ReminderDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ReminderDocumentReference',
    'AdditionalDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\AdditionalDocumentReference',
    'BillingReferenceLine' => 'Invoiceninja\Einvoice\Models\Peppol\BillingReferenceLine',
    'Amount' => 'Invoiceninja\Einvoice\Models\Peppol\Amount',
    'AllowanceCharge' => 'Invoiceninja\Einvoice\Models\Peppol\AllowanceCharge',
    'BaseAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\BaseAmount',
    'PerUnitAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\PerUnitAmount',
    'TaxCategory' => 'Invoiceninja\Einvoice\Models\Peppol\TaxCategoryType\TaxCategory',
    'TaxTotal' => 'Invoiceninja\Einvoice\Models\Peppol\TaxTotal',
    'TaxAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\TaxAmount',
    'RoundingAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\RoundingAmount',
    'TaxSubtotal' => 'Invoiceninja\Einvoice\Models\Peppol\TaxSubtotalType\TaxSubtotal',
    'PaymentMeans' => 'Invoiceninja\Einvoice\Models\Peppol\PaymentMeansType\PaymentMeans',
    'CardAccount' => 'Invoiceninja\Einvoice\Models\Peppol\CardAccountType\CardAccount',
    'PayerFinancialAccount' => 'Invoiceninja\Einvoice\Models\Peppol\FinancialAccountType\PayerFinancialAccount',
    'PayeeFinancialAccount' => 'Invoiceninja\Einvoice\Models\Peppol\FinancialAccountType\PayeeFinancialAccount',
    'CreditAccount' => 'Invoiceninja\Einvoice\Models\Peppol\CreditAccount',
    'PaymentMandate' => 'Invoiceninja\Einvoice\Models\Peppol\PaymentMandateType\PaymentMandate',
    'TradeFinancing' => 'Invoiceninja\Einvoice\Models\Peppol\TradeFinancing',
    'DespatchDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\DespatchDocumentReference',
    'JurisdictionRegionAddress' => 'Invoiceninja\Einvoice\Models\Peppol\AddressType\JurisdictionRegionAddress',
    'FinancialInstitution' => 'Invoiceninja\Einvoice\Models\Peppol\FinancialInstitutionType\FinancialInstitution',
    'ReceiptDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ReceiptDocumentReference',
    'StatementDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\StatementDocumentReference',
    'OriginatorDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\OriginatorDocumentReference',
    'ContractDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ContractDocumentReference',
    'ProjectReference' => 'Invoiceninja\Einvoice\Models\Peppol\ProjectReferenceType\ProjectReference',
    'WorkPhaseReference' => 'Invoiceninja\Einvoice\Models\Peppol\WorkPhaseReferenceType\WorkPhaseReference',
    'WorkOrderDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\WorkOrderDocumentReference',
    'Signature' => 'Invoiceninja\Einvoice\Models\Peppol\SignatureType\Signature',
    'DigitalSignatureAttachment' => 'Invoiceninja\Einvoice\Models\Peppol\AttachmentType\DigitalSignatureAttachment',
    'OriginalDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\OriginalDocumentReference',
    'AccountingSupplierParty' => 'Invoiceninja\Einvoice\Models\Peppol\SupplierPartyType\AccountingSupplierParty',
    'DespatchContact' => 'Invoiceninja\Einvoice\Models\Peppol\ContactType\DespatchContact',
    'AccountingContact' => 'Invoiceninja\Einvoice\Models\Peppol\ContactType\AccountingContact',
    'AccountingCustomerParty' => 'Invoiceninja\Einvoice\Models\Peppol\CustomerPartyType\AccountingCustomerParty',
    'DeliveryContact' => 'Invoiceninja\Einvoice\Models\Peppol\ContactType\DeliveryContact',
    'BuyerContact' => 'Invoiceninja\Einvoice\Models\Peppol\ContactType\BuyerContact',
    'PayeeParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\PayeeParty',
    'BuyerCustomerParty' => 'Invoiceninja\Einvoice\Models\Peppol\CustomerPartyType\BuyerCustomerParty',
    'SellerSupplierParty' => 'Invoiceninja\Einvoice\Models\Peppol\SupplierPartyType\SellerSupplierParty',
    'TaxRepresentativeParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\TaxRepresentativeParty',
    'Delivery' => 'Invoiceninja\Einvoice\Models\Peppol\Delivery',
    'Quantity' => 'Invoiceninja\Einvoice\Models\Peppol\Quantity',
    'MinimumQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\MinimumQuantity',
    'MaximumQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\MaximumQuantity',
    'DeliveryAddress' => 'Invoiceninja\Einvoice\Models\Peppol\AddressType\DeliveryAddress',
    'DeliveryLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\DeliveryLocation',
    'AlternativeDeliveryLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\AlternativeDeliveryLocation',
    'RequestedDeliveryPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\RequestedDeliveryPeriod',
    'PromisedDeliveryPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\PromisedDeliveryPeriod',
    'EstimatedDeliveryPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\EstimatedDeliveryPeriod',
    'CarrierParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\CarrierParty',
    'DeliveryParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\DeliveryParty',
    'NotifyParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\NotifyParty',
    'Despatch' => 'Invoiceninja\Einvoice\Models\Peppol\Despatch',
    'DespatchAddress' => 'Invoiceninja\Einvoice\Models\Peppol\AddressType\DespatchAddress',
    'DespatchLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\DespatchLocation',
    'DespatchParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\DespatchParty',
    'EstimatedDespatchPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\EstimatedDespatchPeriod',
    'RequestedDespatchPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\RequestedDespatchPeriod',
    'DeliveryTerms' => 'Invoiceninja\Einvoice\Models\Peppol\DeliveryTerms',
    'MinimumDeliveryUnit' => 'Invoiceninja\Einvoice\Models\Peppol\DeliveryUnitType\MinimumDeliveryUnit',
    'BatchQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\BatchQuantity',
    'ConsumerUnitQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\ConsumerUnitQuantity',
    'MaximumDeliveryUnit' => 'Invoiceninja\Einvoice\Models\Peppol\DeliveryUnitType\MaximumDeliveryUnit',
    'Shipment' => 'Invoiceninja\Einvoice\Models\Peppol\ShipmentType\Shipment',
    'TotalGoodsItemQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\TotalGoodsItemQuantity',
    'TotalTransportHandlingUnitQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\TotalTransportHandlingUnitQuantity',
    'InsuranceValueAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\InsuranceValueAmount',
    'DeclaredCustomsValueAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\DeclaredCustomsValueAmount',
    'DeclaredForCarriageValueAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\DeclaredForCarriageValueAmount',
    'DeclaredStatisticsValueAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\DeclaredStatisticsValueAmount',
    'FreeOnBoardValueAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\FreeOnBoardValueAmount',
    'ConsignmentQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\ConsignmentQuantity',
    'Consignment' => 'Invoiceninja\Einvoice\Models\Peppol\ConsignmentType\Consignment',
    'TotalInvoiceAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\TotalInvoiceAmount',
    'InsurancePremiumAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\InsurancePremiumAmount',
    'ChildConsignmentQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\ChildConsignmentQuantity',
    'TotalPackagesQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\TotalPackagesQuantity',
    'ConsolidatedShipment' => 'Invoiceninja\Einvoice\Models\Peppol\ShipmentType\ConsolidatedShipment',
    'GoodsItem' => 'Invoiceninja\Einvoice\Models\Peppol\GoodsItem',
    'ShipmentStage' => 'Invoiceninja\Einvoice\Models\Peppol\ShipmentStageType\ShipmentStage',
    'TransportHandlingUnit' => 'Invoiceninja\Einvoice\Models\Peppol\TransportHandlingUnit',
    'ReturnAddress' => 'Invoiceninja\Einvoice\Models\Peppol\AddressType\ReturnAddress',
    'OriginAddress' => 'Invoiceninja\Einvoice\Models\Peppol\AddressType\OriginAddress',
    'FirstArrivalPortLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\FirstArrivalPortLocation',
    'LastExitPortLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\LastExitPortLocation',
    'ExportCountry' => 'Invoiceninja\Einvoice\Models\Peppol\CountryType\ExportCountry',
    'FreightAllowanceCharge' => 'Invoiceninja\Einvoice\Models\Peppol\AllowanceChargeType\FreightAllowanceCharge',
    'CustomsDeclaration' => 'Invoiceninja\Einvoice\Models\Peppol\CustomsDeclarationType\CustomsDeclaration',
    'RequestedPickupTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\RequestedPickupTransportEvent',
    'ReportedShipment' => 'Invoiceninja\Einvoice\Models\Peppol\ShipmentType\ReportedShipment',
    'CurrentStatus' => 'Invoiceninja\Einvoice\Models\Peppol\StatusType\CurrentStatus',
    'Location' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\Location',
    'Period' => 'Invoiceninja\Einvoice\Models\Peppol\Period',
    'RequestedDeliveryTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\RequestedDeliveryTransportEvent',
    'PlannedPickupTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\PlannedPickupTransportEvent',
    'PlannedDeliveryTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\PlannedDeliveryTransportEvent',
    'Status' => 'Invoiceninja\Einvoice\Models\Peppol\StatusType\Status',
    'Condition' => 'Invoiceninja\Einvoice\Models\Peppol\Condition',
    'ChildConsignment' => 'Invoiceninja\Einvoice\Models\Peppol\ConsignmentType\ChildConsignment',
    'ConsigneeParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\ConsigneeParty',
    'ExporterParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\ExporterParty',
    'ConsignorParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\ConsignorParty',
    'ImporterParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\ImporterParty',
    'FreightForwarderParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\FreightForwarderParty',
    'OriginalDespatchParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\OriginalDespatchParty',
    'FinalDeliveryParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\FinalDeliveryParty',
    'PerformingCarrierParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\PerformingCarrierParty',
    'SubstituteCarrierParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\SubstituteCarrierParty',
    'LogisticsOperatorParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\LogisticsOperatorParty',
    'TransportAdvisorParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\TransportAdvisorParty',
    'HazardousItemNotificationParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\HazardousItemNotificationParty',
    'InsuranceParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\InsuranceParty',
    'MortgageHolderParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\MortgageHolderParty',
    'BillOfLadingHolderParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\BillOfLadingHolderParty',
    'OriginalDepartureCountry' => 'Invoiceninja\Einvoice\Models\Peppol\CountryType\OriginalDepartureCountry',
    'FinalDestinationCountry' => 'Invoiceninja\Einvoice\Models\Peppol\CountryType\FinalDestinationCountry',
    'TransitCountry' => 'Invoiceninja\Einvoice\Models\Peppol\CountryType\TransitCountry',
    'TransportContract' => 'Invoiceninja\Einvoice\Models\Peppol\ContractType\TransportContract',
    'TransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEvent',
    'OriginalDespatchTransportationService' => 'Invoiceninja\Einvoice\Models\Peppol\TransportationServiceType\OriginalDespatchTransportationService',
    'FinalDeliveryTransportationService' => 'Invoiceninja\Einvoice\Models\Peppol\TransportationServiceType\FinalDeliveryTransportationService',
    'PaymentTerms' => 'Invoiceninja\Einvoice\Models\Peppol\PaymentTerms',
    'CollectPaymentTerms' => 'Invoiceninja\Einvoice\Models\Peppol\PaymentTermsType\CollectPaymentTerms',
    'DisbursementPaymentTerms' => 'Invoiceninja\Einvoice\Models\Peppol\PaymentTermsType\DisbursementPaymentTerms',
    'PrepaidPaymentTerms' => 'Invoiceninja\Einvoice\Models\Peppol\PaymentTermsType\PrepaidPaymentTerms',
    'ExtraAllowanceCharge' => 'Invoiceninja\Einvoice\Models\Peppol\AllowanceChargeType\ExtraAllowanceCharge',
    'MainCarriageShipmentStage' => 'Invoiceninja\Einvoice\Models\Peppol\ShipmentStageType\MainCarriageShipmentStage',
    'PreCarriageShipmentStage' => 'Invoiceninja\Einvoice\Models\Peppol\ShipmentStageType\PreCarriageShipmentStage',
    'OnCarriageShipmentStage' => 'Invoiceninja\Einvoice\Models\Peppol\ShipmentStageType\OnCarriageShipmentStage',
    'NominationPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\NominationPeriod',
    'ContractualDelivery' => 'Invoiceninja\Einvoice\Models\Peppol\DeliveryType\ContractualDelivery',
    'TransportEquipment' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEquipment',
    'SupportedTransportEquipment' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEquipmentType\SupportedTransportEquipment',
    'UnsupportedTransportEquipment' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEquipmentType\UnsupportedTransportEquipment',
    'CommodityClassification' => 'Invoiceninja\Einvoice\Models\Peppol\CommodityClassificationType\CommodityClassification',
    'SupportedCommodityClassification' => 'Invoiceninja\Einvoice\Models\Peppol\CommodityClassificationType\SupportedCommodityClassification',
    'UnsupportedCommodityClassification' => 'Invoiceninja\Einvoice\Models\Peppol\CommodityClassificationType\UnsupportedCommodityClassification',
    'TotalCapacityDimension' => 'Invoiceninja\Einvoice\Models\Peppol\DimensionType\TotalCapacityDimension',
    'ResponsibleTransportServiceProviderParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\ResponsibleTransportServiceProviderParty',
    'EnvironmentalEmission' => 'Invoiceninja\Einvoice\Models\Peppol\EnvironmentalEmission',
    'EstimatedDurationPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\EstimatedDurationPeriod',
    'ScheduledServiceFrequency' => 'Invoiceninja\Einvoice\Models\Peppol\ServiceFrequencyType\ScheduledServiceFrequency',
    'SettlementDiscountAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\SettlementDiscountAmount',
    'PenaltyAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\PenaltyAmount',
    'SettlementPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\SettlementPeriod',
    'PenaltyPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\PenaltyPeriod',
    'ExchangeRate' => 'Invoiceninja\Einvoice\Models\Peppol\ExchangeRateType\ExchangeRate',
    'CrewQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\CrewQuantity',
    'PassengerQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\PassengerQuantity',
    'TransitPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\TransitPeriod',
    'TransportMeans' => 'Invoiceninja\Einvoice\Models\Peppol\TransportMeansType\TransportMeans',
    'LoadingPortLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\LoadingPortLocation',
    'UnloadingPortLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\UnloadingPortLocation',
    'TransshipPortLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\TransshipPortLocation',
    'LoadingTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\LoadingTransportEvent',
    'ExaminationTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\ExaminationTransportEvent',
    'AvailabilityTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\AvailabilityTransportEvent',
    'ExportationTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\ExportationTransportEvent',
    'DischargeTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\DischargeTransportEvent',
    'WarehousingTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\WarehousingTransportEvent',
    'TakeoverTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\TakeoverTransportEvent',
    'OptionalTakeoverTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\OptionalTakeoverTransportEvent',
    'DropoffTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\DropoffTransportEvent',
    'ActualPickupTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\ActualPickupTransportEvent',
    'DeliveryTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\DeliveryTransportEvent',
    'ReceiptTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\ReceiptTransportEvent',
    'StorageTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\StorageTransportEvent',
    'AcceptanceTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\AcceptanceTransportEvent',
    'TerminalOperatorParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\TerminalOperatorParty',
    'CustomsAgentParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\CustomsAgentParty',
    'EstimatedTransitPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\EstimatedTransitPeriod',
    'FreightChargeLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\FreightChargeLocation',
    'DetentionTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\DetentionTransportEvent',
    'RequestedDepartureTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\RequestedDepartureTransportEvent',
    'RequestedArrivalTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\RequestedArrivalTransportEvent',
    'RequestedWaypointTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\RequestedWaypointTransportEvent',
    'PlannedDepartureTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\PlannedDepartureTransportEvent',
    'PlannedArrivalTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\PlannedArrivalTransportEvent',
    'PlannedWaypointTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\PlannedWaypointTransportEvent',
    'ActualDepartureTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\ActualDepartureTransportEvent',
    'ActualWaypointTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\ActualWaypointTransportEvent',
    'ActualArrivalTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\ActualArrivalTransportEvent',
    'EstimatedDepartureTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\EstimatedDepartureTransportEvent',
    'EstimatedArrivalTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\EstimatedArrivalTransportEvent',
    'PassengerPerson' => 'Invoiceninja\Einvoice\Models\Peppol\PersonType\PassengerPerson',
    'DriverPerson' => 'Invoiceninja\Einvoice\Models\Peppol\PersonType\DriverPerson',
    'ReportingPerson' => 'Invoiceninja\Einvoice\Models\Peppol\PersonType\ReportingPerson',
    'CrewMemberPerson' => 'Invoiceninja\Einvoice\Models\Peppol\PersonType\CrewMemberPerson',
    'SecurityOfficerPerson' => 'Invoiceninja\Einvoice\Models\Peppol\PersonType\SecurityOfficerPerson',
    'MasterPerson' => 'Invoiceninja\Einvoice\Models\Peppol\PersonType\MasterPerson',
    'ShipsSurgeonPerson' => 'Invoiceninja\Einvoice\Models\Peppol\PersonType\ShipsSurgeonPerson',
    'TotalPackageQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\TotalPackageQuantity',
    'HandlingUnitDespatchLine' => 'Invoiceninja\Einvoice\Models\Peppol\DespatchLineType\HandlingUnitDespatchLine',
    'ActualPackage' => 'Invoiceninja\Einvoice\Models\Peppol\PackageType\ActualPackage',
    'ReceivedHandlingUnitReceiptLine' => 'Invoiceninja\Einvoice\Models\Peppol\ReceiptLineType\ReceivedHandlingUnitReceiptLine',
    'HazardousGoodsTransit' => 'Invoiceninja\Einvoice\Models\Peppol\HazardousGoodsTransitType\HazardousGoodsTransit',
    'MeasurementDimension' => 'Invoiceninja\Einvoice\Models\Peppol\DimensionType\MeasurementDimension',
    'MinimumTemperature' => 'Invoiceninja\Einvoice\Models\Peppol\TemperatureType\MinimumTemperature',
    'MaximumTemperature' => 'Invoiceninja\Einvoice\Models\Peppol\TemperatureType\MaximumTemperature',
    'FloorSpaceMeasurementDimension' => 'Invoiceninja\Einvoice\Models\Peppol\DimensionType\FloorSpaceMeasurementDimension',
    'PalletSpaceMeasurementDimension' => 'Invoiceninja\Einvoice\Models\Peppol\DimensionType\PalletSpaceMeasurementDimension',
    'ShipmentDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ShipmentDocumentReference',
    'ReferencedShipment' => 'Invoiceninja\Einvoice\Models\Peppol\ShipmentType\ReferencedShipment',
    'Package' => 'Invoiceninja\Einvoice\Models\Peppol\PackageType\Package',
    'ValueAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\ValueAmount',
    'CustomsTariffQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\CustomsTariffQuantity',
    'ChargeableQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\ChargeableQuantity',
    'ReturnableQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\ReturnableQuantity',
    'Item' => 'Invoiceninja\Einvoice\Models\Peppol\ItemType\Item',
    'PackQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\PackQuantity',
    'BuyersItemIdentification' => 'Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\BuyersItemIdentification',
    'SellersItemIdentification' => 'Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\SellersItemIdentification',
    'ManufacturersItemIdentification' => 'Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\ManufacturersItemIdentification',
    'StandardItemIdentification' => 'Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\StandardItemIdentification',
    'CatalogueItemIdentification' => 'Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\CatalogueItemIdentification',
    'AdditionalItemIdentification' => 'Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\AdditionalItemIdentification',
    'CatalogueDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\CatalogueDocumentReference',
    'ItemSpecificationDocumentReference' => 'Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ItemSpecificationDocumentReference',
    'OriginCountry' => 'Invoiceninja\Einvoice\Models\Peppol\CountryType\OriginCountry',
    'TransactionConditions' => 'Invoiceninja\Einvoice\Models\Peppol\TransactionConditionsType\TransactionConditions',
    'HazardousItem' => 'Invoiceninja\Einvoice\Models\Peppol\HazardousItemType\HazardousItem',
    'ClassifiedTaxCategory' => 'Invoiceninja\Einvoice\Models\Peppol\TaxCategoryType\ClassifiedTaxCategory',
    'AdditionalItemProperty' => 'Invoiceninja\Einvoice\Models\Peppol\ItemPropertyType\AdditionalItemProperty',
    'ManufacturerParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\ManufacturerParty',
    'InformationContentProviderParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\InformationContentProviderParty',
    'ItemInstance' => 'Invoiceninja\Einvoice\Models\Peppol\ItemInstanceType\ItemInstance',
    'Certificate' => 'Invoiceninja\Einvoice\Models\Peppol\CertificateType\Certificate',
    'Dimension' => 'Invoiceninja\Einvoice\Models\Peppol\Dimension',
    'GoodsItemContainer' => 'Invoiceninja\Einvoice\Models\Peppol\GoodsItemContainerType\GoodsItemContainer',
    'InvoiceLine' => 'Invoiceninja\Einvoice\Models\Peppol\InvoiceLine',
    'InvoicedQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\InvoicedQuantity',
    'LineExtensionAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\LineExtensionAmount',
    'OrderLineReference' => 'Invoiceninja\Einvoice\Models\Peppol\OrderLineReferenceType\OrderLineReference',
    'DespatchLineReference' => 'Invoiceninja\Einvoice\Models\Peppol\LineReferenceType\DespatchLineReference',
    'ReceiptLineReference' => 'Invoiceninja\Einvoice\Models\Peppol\LineReferenceType\ReceiptLineReference',
    'PricingReference' => 'Invoiceninja\Einvoice\Models\Peppol\PricingReferenceType\PricingReference',
    'OriginatorParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\OriginatorParty',
    'WithholdingTaxTotal' => 'Invoiceninja\Einvoice\Models\Peppol\TaxTotalType\WithholdingTaxTotal',
    'Price' => 'Invoiceninja\Einvoice\Models\Peppol\Price',
    'SubInvoiceLine' => 'Invoiceninja\Einvoice\Models\Peppol\InvoiceLineType\SubInvoiceLine',
    'ItemPriceExtension' => 'Invoiceninja\Einvoice\Models\Peppol\PriceExtensionType\ItemPriceExtension',
    'Temperature' => 'Invoiceninja\Einvoice\Models\Peppol\TemperatureType\Temperature',
    'ContainedGoodsItem' => 'Invoiceninja\Einvoice\Models\Peppol\GoodsItemType\ContainedGoodsItem',
    'Pickup' => 'Invoiceninja\Einvoice\Models\Peppol\PickupType\Pickup',
    'ContainingPackage' => 'Invoiceninja\Einvoice\Models\Peppol\PackageType\ContainingPackage',
    'PickupLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\PickupLocation',
    'PickupParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\PickupParty',
    'ContainedPackage' => 'Invoiceninja\Einvoice\Models\Peppol\PackageType\ContainedPackage',
    'ContainingTransportEquipment' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEquipmentType\ContainingTransportEquipment',
    'DeliveryUnit' => 'Invoiceninja\Einvoice\Models\Peppol\DeliveryUnit',
    'Stowage' => 'Invoiceninja\Einvoice\Models\Peppol\StowageType\Stowage',
    'AirTransport' => 'Invoiceninja\Einvoice\Models\Peppol\AirTransport',
    'RoadTransport' => 'Invoiceninja\Einvoice\Models\Peppol\RoadTransport',
    'RailTransport' => 'Invoiceninja\Einvoice\Models\Peppol\RailTransportType\RailTransport',
    'MaritimeTransport' => 'Invoiceninja\Einvoice\Models\Peppol\MaritimeTransportType\MaritimeTransport',
    'OwnerParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\OwnerParty',
    'DeliveredQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\DeliveredQuantity',
    'BackorderQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\BackorderQuantity',
    'OutstandingQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\OutstandingQuantity',
    'OversupplyQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\OversupplyQuantity',
    'ReceivedQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\ReceivedQuantity',
    'ShortQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\ShortQuantity',
    'RejectedQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\RejectedQuantity',
    'TransportEquipmentSeal' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEquipmentSealType\TransportEquipmentSeal',
    'ProviderParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\ProviderParty',
    'LoadingProofParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\LoadingProofParty',
    'SupplierParty' => 'Invoiceninja\Einvoice\Models\Peppol\SupplierPartyType\SupplierParty',
    'OperatingParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\OperatingParty',
    'LoadingLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\LoadingLocation',
    'UnloadingLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\UnloadingLocation',
    'StorageLocation' => 'Invoiceninja\Einvoice\Models\Peppol\LocationType\StorageLocation',
    'PositioningTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\PositioningTransportEvent',
    'QuarantineTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\QuarantineTransportEvent',
    'PickupTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\PickupTransportEvent',
    'HandlingTransportEvent' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEventType\HandlingTransportEvent',
    'ApplicableTransportMeans' => 'Invoiceninja\Einvoice\Models\Peppol\TransportMeansType\ApplicableTransportMeans',
    'HaulageTradingTerms' => 'Invoiceninja\Einvoice\Models\Peppol\TradingTermsType\HaulageTradingTerms',
    'PackagedTransportHandlingUnit' => 'Invoiceninja\Einvoice\Models\Peppol\TransportHandlingUnitType\PackagedTransportHandlingUnit',
    'ServiceAllowanceCharge' => 'Invoiceninja\Einvoice\Models\Peppol\AllowanceChargeType\ServiceAllowanceCharge',
    'AttachedTransportEquipment' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEquipmentType\AttachedTransportEquipment',
    'ContainedInTransportEquipment' => 'Invoiceninja\Einvoice\Models\Peppol\TransportEquipmentType\ContainedInTransportEquipment',
    'TaxableAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\TaxableAmount',
    'TransactionCurrencyTaxAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\TransactionCurrencyTaxAmount',
    'MaximumPaidAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\MaximumPaidAmount',
    'PayerParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\PayerParty',
    'PaymentReversalPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\PaymentReversalPeriod',
    'Clause' => 'Invoiceninja\Einvoice\Models\Peppol\Clause',
    'FinancingParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\FinancingParty',
    'FinancingFinancialAccount' => 'Invoiceninja\Einvoice\Models\Peppol\FinancialAccountType\FinancingFinancialAccount',
    'ForeignExchangeContract' => 'Invoiceninja\Einvoice\Models\Peppol\ContractType\ForeignExchangeContract',
    'PrepaidPayment' => 'Invoiceninja\Einvoice\Models\Peppol\PaymentType\PrepaidPayment',
    'PaidAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\PaidAmount',
    'TaxExchangeRate' => 'Invoiceninja\Einvoice\Models\Peppol\ExchangeRateType\TaxExchangeRate',
    'PricingExchangeRate' => 'Invoiceninja\Einvoice\Models\Peppol\ExchangeRateType\PricingExchangeRate',
    'PaymentExchangeRate' => 'Invoiceninja\Einvoice\Models\Peppol\ExchangeRateType\PaymentExchangeRate',
    'PaymentAlternativeExchangeRate' => 'Invoiceninja\Einvoice\Models\Peppol\ExchangeRateType\PaymentAlternativeExchangeRate',
    'LegalMonetaryTotal' => 'Invoiceninja\Einvoice\Models\Peppol\MonetaryTotalType\LegalMonetaryTotal',
    'TaxExclusiveAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\TaxExclusiveAmount',
    'TaxInclusiveAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\TaxInclusiveAmount',
    'AllowanceTotalAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\AllowanceTotalAmount',
    'ChargeTotalAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\ChargeTotalAmount',
    'PrepaidAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\PrepaidAmount',
    'PayableRoundingAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\PayableRoundingAmount',
    'PayableAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\PayableAmount',
    'PayableAlternativeAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\PayableAlternativeAmount',
    'OriginalItemLocationQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\ItemLocationQuantityType\OriginalItemLocationQuantity',
    'ApplicableTerritoryAddress' => 'Invoiceninja\Einvoice\Models\Peppol\AddressType\ApplicableTerritoryAddress',
    'PriceAmount' => 'Invoiceninja\Einvoice\Models\Peppol\AmountType\PriceAmount',
    'BaseQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\BaseQuantity',
    'PriceList' => 'Invoiceninja\Einvoice\Models\Peppol\PriceListType\PriceList',
    'ApplicableTaxCategory' => 'Invoiceninja\Einvoice\Models\Peppol\TaxCategoryType\ApplicableTaxCategory',
    'DependentPriceReference' => 'Invoiceninja\Einvoice\Models\Peppol\DependentPriceReferenceType\DependentPriceReference',
    'LocationAddress' => 'Invoiceninja\Einvoice\Models\Peppol\AddressType\LocationAddress',
    'DependentLineReference' => 'Invoiceninja\Einvoice\Models\Peppol\LineReferenceType\DependentLineReference',
    'AlternativeConditionPrice' => 'Invoiceninja\Einvoice\Models\Peppol\PriceType\AlternativeConditionPrice',
    'PreviousPriceList' => 'Invoiceninja\Einvoice\Models\Peppol\PriceListType\PreviousPriceList',
    'PhysicalAttribute' => 'Invoiceninja\Einvoice\Models\Peppol\PhysicalAttribute',
    'ContactParty' => 'Invoiceninja\Einvoice\Models\Peppol\PartyType\ContactParty',
    'SecondaryHazard' => 'Invoiceninja\Einvoice\Models\Peppol\SecondaryHazardType\SecondaryHazard',
    'EmergencyTemperature' => 'Invoiceninja\Einvoice\Models\Peppol\TemperatureType\EmergencyTemperature',
    'FlashpointTemperature' => 'Invoiceninja\Einvoice\Models\Peppol\TemperatureType\FlashpointTemperature',
    'AdditionalTemperature' => 'Invoiceninja\Einvoice\Models\Peppol\TemperatureType\AdditionalTemperature',
    'ValueQuantity' => 'Invoiceninja\Einvoice\Models\Peppol\QuantityType\ValueQuantity',
    'UsabilityPeriod' => 'Invoiceninja\Einvoice\Models\Peppol\PeriodType\UsabilityPeriod',
    'ItemPropertyGroup' => 'Invoiceninja\Einvoice\Models\Peppol\ItemPropertyGroup',
    'RangeDimension' => 'Invoiceninja\Einvoice\Models\Peppol\DimensionType\RangeDimension',
    'ItemPropertyRange' => 'Invoiceninja\Einvoice\Models\Peppol\ItemPropertyRangeType\ItemPropertyRange',
    'LotIdentification' => 'Invoiceninja\Einvoice\Models\Peppol\LotIdentificationType\LotIdentification',
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

            $parent_elements[$parts[1]] = array_merge($this->stub_validation, [
                'name' => $parts[1],
                'base_type' => $element->getAttribute('ref'),
                'min_occurs' => (int)$element->getAttribute('minOccurs'),
                'max_occurs' => (int)$maxOccurs,
                'help' => $this->getAnnotation($element),
                'namespace' => $parts[0],
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

    private function getAnnotation(DOMElement $element): string
    {
        $result = $this->getXPath("./{$this->prefix}:annotation//{$this->prefix}:documentation//ccts:Component//ccts:Definition", $element);

        return $result->count() > 0 ? trim(str_replace("\n", "", $result->item(0)->nodeValue)) : '';

    }

    private function getXPath(string $path, \DomElement $element = null): ?\DOMNodeList
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
        $this->type_tracker[] = 'QuantityType';
        $element_collection = collect($this->cacType->elements);

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
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique()
        ->map(function ($type) {

            $this->type_tracker[] = $type;
            return $this->cacType->typesForType($type);
        })
        ->flatten()
        ->unique();

        collect($this->type_tracker)
        ->unique()
        ->each(function ($type) use ($element_collection) {

            $type_array = $element_collection->where('type', $type)->first();

            $new_set = [];
            foreach($type_array['elements'] as $stub) {
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

        match($parts[0]) {
            'cac' => $type = $this->cacType,
            'cbc' => $type = $this->cbcType,
            'ext' => $type = $this->extType,
        };

        return $type->getNamedType($parts[1]);

    }


}
