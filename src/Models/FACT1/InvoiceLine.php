<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\BillingReferenceType\BillingReference;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryTermsType\DeliveryTerms;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\InvoiceLineType\SubInvoiceLine;
use Invoiceninja\Einvoice\Models\FACT1\ItemType\Item;
use Invoiceninja\Einvoice\Models\FACT1\LineReferenceType\DespatchLineReference;
use Invoiceninja\Einvoice\Models\FACT1\LineReferenceType\ReceiptLineReference;
use Invoiceninja\Einvoice\Models\FACT1\OrderLineReferenceType\OrderLineReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\OriginatorParty;
use Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType\PaymentTerms;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\InvoicePeriod;
use Invoiceninja\Einvoice\Models\FACT1\PriceExtensionType\ItemPriceExtension;
use Invoiceninja\Einvoice\Models\FACT1\PriceType\Price;
use Invoiceninja\Einvoice\Models\FACT1\PricingReferenceType\PricingReference;
use Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\TaxTotal;
use Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\WithholdingTaxTotal;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class InvoiceLine extends Data
{
	#[Required]
	public string $ID;
	public string|Optional $UUID;

	#[DataCollectionOf('string')]
	public string|Optional $Note;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $InvoicedQuantity;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $LineExtensionAmount;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $TaxPointDate;
	public string|Optional $AccountingCostCode;
	public string|Optional $AccountingCost;
	public string|Optional $PaymentPurposeCode;
	public bool|Optional $FreeOfChargeIndicator;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PeriodType\InvoicePeriod')]
	public InvoicePeriod|Optional $InvoicePeriod;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\OrderLineReferenceType\OrderLineReference')]
	public OrderLineReference|Optional $OrderLineReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\LineReferenceType\DespatchLineReference')]
	public DespatchLineReference|Optional $DespatchLineReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\LineReferenceType\ReceiptLineReference')]
	public ReceiptLineReference|Optional $ReceiptLineReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\BillingReferenceType\BillingReference')]
	public BillingReference|Optional $BillingReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference')]
	public DocumentReference|Optional $DocumentReference;
	public PricingReference|Optional $PricingReference;
	public OriginatorParty|Optional $OriginatorParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery')]
	public Delivery|Optional $Delivery;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType\PaymentTerms')]
	public PaymentTerms|Optional $PaymentTerms;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge')]
	public AllowanceCharge|Optional $AllowanceCharge;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\TaxTotal')]
	public TaxTotal|Optional $TaxTotal;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\WithholdingTaxTotal')]
	public WithholdingTaxTotal|Optional $WithholdingTaxTotal;

	#[Required]
	public Item $Item;
	public Price|Optional $Price;
	public DeliveryTerms|Optional $DeliveryTerms;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\InvoiceLineType\SubInvoiceLine')]
	public SubInvoiceLine|Optional $SubInvoiceLine;
	public ItemPriceExtension|Optional $ItemPriceExtension;
}
