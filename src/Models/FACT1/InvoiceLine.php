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
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class InvoiceLine extends Data
{
	public ?string $ID;
	public string|Optional $UUID;
	public string|Optional $Note;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $InvoicedQuantity;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $LineExtensionAmount;
	public Carbon|Optional $TaxPointDate;
	public string|Optional $AccountingCostCode;
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
	public SubInvoiceLine|Optional $SubInvoiceLine;
	public ItemPriceExtension|Optional $ItemPriceExtension;
}
