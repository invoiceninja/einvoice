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
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class SubInvoiceLine extends Data
{
	public ?string $ID;
	public string|Optional $UUID;

	#[Max(300)]
	public string|Optional $Note;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $InvoicedQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $LineExtensionAmount;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $TaxPointDate;
	public string|Optional $AccountingCostCode;

	#[Max(100)]
	public string|Optional $AccountingCost;
	public string|Optional $PaymentPurposeCode;
	public \boolean|Optional $FreeOfChargeIndicator;
	public InvoicePeriod|Optional $InvoicePeriod;
	public OrderLineReference|Optional $OrderLineReference;
	public DespatchLineReference|Optional $DespatchLineReference;
	public ReceiptLineReference|Optional $ReceiptLineReference;
	public BillingReference|Optional $BillingReference;
	public DocumentReference|Optional $DocumentReference;
	public PricingReference|Optional $PricingReference;
	public OriginatorParty|Optional $OriginatorParty;
	public Delivery|Optional $Delivery;
	public PaymentTerms|Optional $PaymentTerms;
	public AllowanceCharge|Optional $AllowanceCharge;
	public TaxTotal|Optional $TaxTotal;
	public WithholdingTaxTotal|Optional $WithholdingTaxTotal;
	public ?Item $Item;
	public Price|Optional $Price;
	public DeliveryTerms|Optional $DeliveryTerms;
	public ItemPriceExtension|Optional $ItemPriceExtension;
}
