<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\Peppol\BillingReferenceType\BillingReference;
use Invoiceninja\Einvoice\Models\Peppol\CustomerPartyType\AccountingCustomerParty;
use Invoiceninja\Einvoice\Models\Peppol\CustomerPartyType\BuyerCustomerParty;
use Invoiceninja\Einvoice\Models\Peppol\DeliveryTermsType\DeliveryTerms;
use Invoiceninja\Einvoice\Models\Peppol\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\AdditionalDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ContractDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\DespatchDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\OriginatorDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ReceiptDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\StatementDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\ExchangeRateType\PaymentAlternativeExchangeRate;
use Invoiceninja\Einvoice\Models\Peppol\ExchangeRateType\PaymentExchangeRate;
use Invoiceninja\Einvoice\Models\Peppol\ExchangeRateType\PricingExchangeRate;
use Invoiceninja\Einvoice\Models\Peppol\ExchangeRateType\TaxExchangeRate;
use Invoiceninja\Einvoice\Models\Peppol\InvoiceLineType\InvoiceLine;
use Invoiceninja\Einvoice\Models\Peppol\MonetaryTotalType\LegalMonetaryTotal;
use Invoiceninja\Einvoice\Models\Peppol\OrderReferenceType\OrderReference;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\PayeeParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\TaxRepresentativeParty;
use Invoiceninja\Einvoice\Models\Peppol\PaymentMeansType\PaymentMeans;
use Invoiceninja\Einvoice\Models\Peppol\PaymentTermsType\PaymentTerms;
use Invoiceninja\Einvoice\Models\Peppol\PaymentType\PrepaidPayment;
use Invoiceninja\Einvoice\Models\Peppol\PeriodType\InvoicePeriod;
use Invoiceninja\Einvoice\Models\Peppol\ProjectReferenceType\ProjectReference;
use Invoiceninja\Einvoice\Models\Peppol\SignatureType\Signature;
use Invoiceninja\Einvoice\Models\Peppol\SupplierPartyType\AccountingSupplierParty;
use Invoiceninja\Einvoice\Models\Peppol\SupplierPartyType\SellerSupplierParty;
use Invoiceninja\Einvoice\Models\Peppol\TaxTotalType\TaxTotal;
use Invoiceninja\Einvoice\Models\Peppol\TaxTotalType\WithholdingTaxTotal;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Invoice
{
    /** @var string */
    #[SerializedName('cbc:UBLVersionID')]
    public string $UBLVersionID;

    /** @var string */
    #[SerializedName('cbc:CustomizationID')]
    public string $CustomizationID;

    /** @var string */
    #[SerializedName('cbc:ProfileID')]
    public string $ProfileID;

    /** @var string */
    #[SerializedName('cbc:ProfileExecutionID')]
    public string $ProfileExecutionID;

    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var bool */
    #[SerializedName('cbc:CopyIndicator')]
    public bool $CopyIndicator;

    /** @var string */
    #[SerializedName('cbc:UUID')]
    public string $UUID;

    /** @var DateTime */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:IssueDate')]
    public DateTime $IssueDate;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
    #[SerializedName('cbc:IssueTime')]
    public DateTime $IssueTime;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:DueDate')]
    public DateTime $DueDate;

    /** @var string */
    #[SerializedName('cbc:InvoiceTypeCode')]
    public string $InvoiceTypeCode;

    /** @var string */
    #[SerializedName('cbc:Note')]
    public string $Note;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:TaxPointDate')]
    public DateTime $TaxPointDate;

    /** @var string */
    #[SerializedName('cbc:DocumentCurrencyCode')]
    public string $DocumentCurrencyCode;

    /** @var string */
    #[SerializedName('cbc:TaxCurrencyCode')]
    public string $TaxCurrencyCode;

    /** @var string */
    #[SerializedName('cbc:PricingCurrencyCode')]
    public string $PricingCurrencyCode;

    /** @var string */
    #[SerializedName('cbc:PaymentCurrencyCode')]
    public string $PaymentCurrencyCode;

    /** @var string */
    #[SerializedName('cbc:PaymentAlternativeCurrencyCode')]
    public string $PaymentAlternativeCurrencyCode;

    /** @var string */
    #[SerializedName('cbc:AccountingCostCode')]
    public string $AccountingCostCode;

    /** @var string */
    #[SerializedName('cbc:AccountingCost')]
    public string $AccountingCost;

    /** @var string */
    #[SerializedName('cbc:LineCountNumeric')]
    public string $LineCountNumeric;

    /** @var string */
    #[SerializedName('cbc:BuyerReference')]
    public string $BuyerReference;

    /** @var InvoicePeriod[] */
    #[SerializedName('cac:InvoicePeriod')]
    public array $InvoicePeriod;

    /** @var OrderReference */
    #[SerializedName('cac:OrderReference')]
    public $OrderReference;

    /** @var BillingReference[] */
    #[SerializedName('cac:BillingReference')]
    public array $BillingReference;

    /** @var DespatchDocumentReference[] */
    #[SerializedName('cac:DespatchDocumentReference')]
    public array $DespatchDocumentReference;

    /** @var ReceiptDocumentReference[] */
    #[SerializedName('cac:ReceiptDocumentReference')]
    public array $ReceiptDocumentReference;

    /** @var StatementDocumentReference[] */
    #[SerializedName('cac:StatementDocumentReference')]
    public array $StatementDocumentReference;

    /** @var OriginatorDocumentReference[] */
    #[SerializedName('cac:OriginatorDocumentReference')]
    public array $OriginatorDocumentReference;

    /** @var ContractDocumentReference[] */
    #[SerializedName('cac:ContractDocumentReference')]
    public array $ContractDocumentReference;

    /** @var AdditionalDocumentReference[] */
    #[SerializedName('cac:AdditionalDocumentReference')]
    public array $AdditionalDocumentReference;

    /** @var ProjectReference[] */
    #[SerializedName('cac:ProjectReference')]
    public array $ProjectReference;

    /** @var Signature[] */
    #[SerializedName('cac:Signature')]
    public array $Signature;

    /** @var AccountingSupplierParty */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    #[SerializedName('cac:AccountingSupplierParty')]
    public $AccountingSupplierParty;

    /** @var AccountingCustomerParty */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    #[SerializedName('cac:AccountingCustomerParty')]
    public $AccountingCustomerParty;

    /** @var PayeeParty */
    #[SerializedName('cac:PayeeParty')]
    public $PayeeParty;

    /** @var BuyerCustomerParty */
    #[SerializedName('cac:BuyerCustomerParty')]
    public $BuyerCustomerParty;

    /** @var SellerSupplierParty */
    #[SerializedName('cac:SellerSupplierParty')]
    public $SellerSupplierParty;

    /** @var TaxRepresentativeParty */
    #[SerializedName('cac:TaxRepresentativeParty')]
    public $TaxRepresentativeParty;

    /** @var Delivery[] */
    #[SerializedName('cac:Delivery')]
    public array $Delivery;

    /** @var DeliveryTerms */
    #[SerializedName('cac:DeliveryTerms')]
    public $DeliveryTerms;

    /** @var PaymentMeans[] */
    #[SerializedName('cac:PaymentMeans')]
    public array $PaymentMeans;

    /** @var PaymentTerms[] */
    #[SerializedName('cac:PaymentTerms')]
    public array $PaymentTerms;

    /** @var PrepaidPayment[] */
    #[SerializedName('cac:PrepaidPayment')]
    public array $PrepaidPayment;

    /** @var AllowanceCharge[] */
    #[SerializedName('cac:AllowanceCharge')]
    public array $AllowanceCharge;

    /** @var TaxExchangeRate */
    #[SerializedName('cac:TaxExchangeRate')]
    public $TaxExchangeRate;

    /** @var PricingExchangeRate */
    #[SerializedName('cac:PricingExchangeRate')]
    public $PricingExchangeRate;

    /** @var PaymentExchangeRate */
    #[SerializedName('cac:PaymentExchangeRate')]
    public $PaymentExchangeRate;

    /** @var PaymentAlternativeExchangeRate */
    #[SerializedName('cac:PaymentAlternativeExchangeRate')]
    public $PaymentAlternativeExchangeRate;

    /** @var TaxTotal[] */
    #[SerializedName('cac:TaxTotal')]
    public array $TaxTotal;

    /** @var WithholdingTaxTotal[] */
    #[SerializedName('cac:WithholdingTaxTotal')]
    public array $WithholdingTaxTotal;

    /** @var LegalMonetaryTotal */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    #[SerializedName('cac:LegalMonetaryTotal')]
    public $LegalMonetaryTotal;

    /** @var InvoiceLine[] */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    #[SerializedName('cac:InvoiceLine')]
    public array $InvoiceLine;
}
