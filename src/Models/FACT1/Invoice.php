<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\BillingReferenceType\BillingReference;
use Invoiceninja\Einvoice\Models\FACT1\CustomerPartyType\AccountingCustomerParty;
use Invoiceninja\Einvoice\Models\FACT1\CustomerPartyType\BuyerCustomerParty;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryTermsType\DeliveryTerms;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\AdditionalDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ContractDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DespatchDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\OriginatorDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ReceiptDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\StatementDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\ExchangeRateType\PaymentAlternativeExchangeRate;
use Invoiceninja\Einvoice\Models\FACT1\ExchangeRateType\PaymentExchangeRate;
use Invoiceninja\Einvoice\Models\FACT1\ExchangeRateType\PricingExchangeRate;
use Invoiceninja\Einvoice\Models\FACT1\ExchangeRateType\TaxExchangeRate;
use Invoiceninja\Einvoice\Models\FACT1\InvoiceLineType\InvoiceLine;
use Invoiceninja\Einvoice\Models\FACT1\MonetaryTotalType\LegalMonetaryTotal;
use Invoiceninja\Einvoice\Models\FACT1\OrderReferenceType\OrderReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\PayeeParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\TaxRepresentativeParty;
use Invoiceninja\Einvoice\Models\FACT1\PaymentMeansType\PaymentMeans;
use Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType\PaymentTerms;
use Invoiceninja\Einvoice\Models\FACT1\PaymentType\PrepaidPayment;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\InvoicePeriod;
use Invoiceninja\Einvoice\Models\FACT1\ProjectReferenceType\ProjectReference;
use Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature;
use Invoiceninja\Einvoice\Models\FACT1\SupplierPartyType\AccountingSupplierParty;
use Invoiceninja\Einvoice\Models\FACT1\SupplierPartyType\SellerSupplierParty;
use Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\TaxTotal;
use Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\WithholdingTaxTotal;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class Invoice extends Data
{
	public string|Optional $UBLVersionID;
	public string|Optional $CustomizationID;
	public string|Optional $ProfileID;
	public string|Optional $ProfileExecutionID;

	#[Required]
	public string $ID;
	public bool|Optional $CopyIndicator;
	public string|Optional $UUID;

	#[Required]
	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon $IssueDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $IssueTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DueDate;
	private array $InvoiceTypeCode_array = [0, 1, 2, 3];

	#[\Spatie\LaravelData\Attributes\Validation\In('380', '384', '389', '751')]
	public string|Optional $InvoiceTypeCode;

	#[DataCollectionOf('string')]
	public string|Optional $Note;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $TaxPointDate;
	public string|Optional $DocumentCurrencyCode;
	public string|Optional $TaxCurrencyCode;
	public string|Optional $PricingCurrencyCode;
	public string|Optional $PaymentCurrencyCode;
	public string|Optional $PaymentAlternativeCurrencyCode;
	public string|Optional $AccountingCostCode;
	public string|Optional $AccountingCost;
	public string|Optional $LineCountNumeric;
	public string|Optional $BuyerReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PeriodType\InvoicePeriod')]
	public InvoicePeriod|Optional $InvoicePeriod;
	public OrderReference|Optional $OrderReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\BillingReferenceType\BillingReference')]
	public BillingReference|Optional $BillingReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DespatchDocumentReference')]
	public DespatchDocumentReference|Optional $DespatchDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ReceiptDocumentReference')]
	public ReceiptDocumentReference|Optional $ReceiptDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\StatementDocumentReference')]
	public StatementDocumentReference|Optional $StatementDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\OriginatorDocumentReference')]
	public OriginatorDocumentReference|Optional $OriginatorDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ContractDocumentReference')]
	public ContractDocumentReference|Optional $ContractDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\AdditionalDocumentReference')]
	public AdditionalDocumentReference|Optional $AdditionalDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ProjectReferenceType\ProjectReference')]
	public ProjectReference|Optional $ProjectReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature')]
	public Signature|Optional $Signature;

	#[Required]
	public AccountingSupplierParty $AccountingSupplierParty;

	#[Required]
	public AccountingCustomerParty $AccountingCustomerParty;
	public PayeeParty|Optional $PayeeParty;
	public BuyerCustomerParty|Optional $BuyerCustomerParty;
	public SellerSupplierParty|Optional $SellerSupplierParty;
	public TaxRepresentativeParty|Optional $TaxRepresentativeParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery')]
	public Delivery|Optional $Delivery;
	public DeliveryTerms|Optional $DeliveryTerms;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PaymentMeansType\PaymentMeans')]
	public PaymentMeans|Optional $PaymentMeans;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType\PaymentTerms')]
	public PaymentTerms|Optional $PaymentTerms;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PaymentType\PrepaidPayment')]
	public PrepaidPayment|Optional $PrepaidPayment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge')]
	public AllowanceCharge|Optional $AllowanceCharge;
	public TaxExchangeRate|Optional $TaxExchangeRate;
	public PricingExchangeRate|Optional $PricingExchangeRate;
	public PaymentExchangeRate|Optional $PaymentExchangeRate;
	public PaymentAlternativeExchangeRate|Optional $PaymentAlternativeExchangeRate;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\TaxTotal')]
	public TaxTotal|Optional $TaxTotal;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\WithholdingTaxTotal')]
	public WithholdingTaxTotal|Optional $WithholdingTaxTotal;

	#[Required]
	public LegalMonetaryTotal $LegalMonetaryTotal;

	#[Required]
	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\InvoiceLineType\InvoiceLine')]
	public DataCollection $InvoiceLine;
}
