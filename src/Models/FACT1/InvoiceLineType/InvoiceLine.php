<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\InvoiceLineType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\BillingReferenceType\BillingReference;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryTermsType\DeliveryTerms;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
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
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Max;
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

	#[DataCollectionOf('Note')]
	#[Max(300)]
	public string|Optional $Note;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $InvoicedQuantity;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $LineExtensionAmount;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $TaxPointDate;
	public string|Optional $AccountingCostCode;

	#[Max(100)]
	public string|Optional $AccountingCost;
	public string|Optional $PaymentPurposeCode;
	public bool|Optional $FreeOfChargeIndicator;

	#[DataCollectionOf('InvoicePeriod')]
	public InvoicePeriod|Optional $InvoicePeriod;

	#[DataCollectionOf('OrderLineReference')]
	public OrderLineReference|Optional $OrderLineReference;

	#[DataCollectionOf('DespatchLineReference')]
	public DespatchLineReference|Optional $DespatchLineReference;

	#[DataCollectionOf('ReceiptLineReference')]
	public ReceiptLineReference|Optional $ReceiptLineReference;

	#[DataCollectionOf('BillingReference')]
	public BillingReference|Optional $BillingReference;

	#[DataCollectionOf('DocumentReference')]
	public DocumentReference|Optional $DocumentReference;
	public PricingReference|Optional $PricingReference;
	public OriginatorParty|Optional $OriginatorParty;

	#[DataCollectionOf('Delivery')]
	public Delivery|Optional $Delivery;

	#[DataCollectionOf('PaymentTerms')]
	public PaymentTerms|Optional $PaymentTerms;

	#[DataCollectionOf('AllowanceCharge')]
	public AllowanceCharge|Optional $AllowanceCharge;

	#[DataCollectionOf('TaxTotal')]
	public TaxTotal|Optional $TaxTotal;

	#[DataCollectionOf('WithholdingTaxTotal')]
	public WithholdingTaxTotal|Optional $WithholdingTaxTotal;

	#[Required]
	public Item $Item;
	public Price|Optional $Price;
	public DeliveryTerms|Optional $DeliveryTerms;

	#[DataCollectionOf('SubInvoiceLine')]
	public SubInvoiceLine|Optional $SubInvoiceLine;
	public ItemPriceExtension|Optional $ItemPriceExtension;
}
