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
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class InvoiceLine extends Data
{
	#[Required]
	public ?string $ID;
	public string|Optional $UUID;

	/** @param array<Note> $Note */
	public array|Optional $Note;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $InvoicedQuantity;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $LineExtensionAmount;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $TaxPointDate;
	public string|Optional $AccountingCostCode;
	public string|Optional $AccountingCost;
	public string|Optional $PaymentPurposeCode;
	public bool|Optional $FreeOfChargeIndicator;

	/** @param array<InvoicePeriod> $InvoicePeriod */
	public array|Optional $InvoicePeriod;

	/** @param array<OrderLineReference> $OrderLineReference */
	public array|Optional $OrderLineReference;

	/** @param array<DespatchLineReference> $DespatchLineReference */
	public array|Optional $DespatchLineReference;

	/** @param array<ReceiptLineReference> $ReceiptLineReference */
	public array|Optional $ReceiptLineReference;

	/** @param array<BillingReference> $BillingReference */
	public array|Optional $BillingReference;

	/** @param array<DocumentReference> $DocumentReference */
	public array|Optional $DocumentReference;
	public PricingReference|Optional $PricingReference;
	public OriginatorParty|Optional $OriginatorParty;

	/** @param array<Delivery> $Delivery */
	public array|Optional $Delivery;

	/** @param array<PaymentTerms> $PaymentTerms */
	public array|Optional $PaymentTerms;

	/** @param array<AllowanceCharge> $AllowanceCharge */
	public array|Optional $AllowanceCharge;

	/** @param array<TaxTotal> $TaxTotal */
	public array|Optional $TaxTotal;

	/** @param array<WithholdingTaxTotal> $WithholdingTaxTotal */
	public array|Optional $WithholdingTaxTotal;

	#[Required]
	public ?Item $Item;
	public Price|Optional $Price;
	public DeliveryTerms|Optional $DeliveryTerms;

	/** @param array<SubInvoiceLine> $SubInvoiceLine */
	public array|Optional $SubInvoiceLine;
	public ItemPriceExtension|Optional $ItemPriceExtension;
}
