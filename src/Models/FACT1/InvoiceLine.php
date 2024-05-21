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
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class InvoiceLine extends Data
{
	#[Required]
	public string $ID;
	public string|Optional $UUID;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Note;

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
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $InvoicePeriod;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\OrderLineReferenceType\OrderLineReference')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $OrderLineReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\LineReferenceType\DespatchLineReference')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DespatchLineReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\LineReferenceType\ReceiptLineReference')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ReceiptLineReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\BillingReferenceType\BillingReference')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $BillingReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DocumentReference;
	public PricingReference|Optional $PricingReference;
	public OriginatorParty|Optional $OriginatorParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Delivery;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType\PaymentTerms')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PaymentTerms;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $AllowanceCharge;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\TaxTotal')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TaxTotal;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\WithholdingTaxTotal')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $WithholdingTaxTotal;

	#[Required]
	public Item $Item;
	public Price|Optional $Price;
	public DeliveryTerms|Optional $DeliveryTerms;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\InvoiceLineType\SubInvoiceLine')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $SubInvoiceLine;
	public ItemPriceExtension|Optional $ItemPriceExtension;
}
