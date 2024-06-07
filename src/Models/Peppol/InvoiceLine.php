<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\AllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\LineExtensionAmount;
use InvoiceNinja\EInvoice\Models\Peppol\BillingReferenceType\BillingReference;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryTermsType\DeliveryTerms;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\Delivery;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\InvoiceLineType\SubInvoiceLine;
use InvoiceNinja\EInvoice\Models\Peppol\ItemType\Item;
use InvoiceNinja\EInvoice\Models\Peppol\LineReferenceType\DespatchLineReference;
use InvoiceNinja\EInvoice\Models\Peppol\LineReferenceType\ReceiptLineReference;
use InvoiceNinja\EInvoice\Models\Peppol\OrderLineReferenceType\OrderLineReference;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\OriginatorParty;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentTermsType\PaymentTerms;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\InvoicePeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PriceExtensionType\ItemPriceExtension;
use InvoiceNinja\EInvoice\Models\Peppol\PriceType\Price;
use InvoiceNinja\EInvoice\Models\Peppol\PricingReferenceType\PricingReference;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\InvoicedQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\TaxTotalType\TaxTotal;
use InvoiceNinja\EInvoice\Models\Peppol\TaxTotalType\WithholdingTaxTotal;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class InvoiceLine
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:UUID')]
	public string $UUID;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var InvoicedQuantity */
	#[SerializedName('cbc:InvoicedQuantity')]
	public $InvoicedQuantity;

	/** @var LineExtensionAmount */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:LineExtensionAmount')]
	public $LineExtensionAmount;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:TaxPointDate')]
	public DateTime $TaxPointDate;

	/** @var string */
	#[SerializedName('cbc:AccountingCostCode')]
	public string $AccountingCostCode;

	/** @var string */
	#[SerializedName('cbc:AccountingCost')]
	public string $AccountingCost;

	/** @var string */
	#[SerializedName('cbc:PaymentPurposeCode')]
	public string $PaymentPurposeCode;

	/** @var bool */
	#[SerializedName('cbc:FreeOfChargeIndicator')]
	public bool $FreeOfChargeIndicator;

	/** @var InvoicePeriod[] */
	#[SerializedName('cac:InvoicePeriod')]
	public array $InvoicePeriod;

	/** @var OrderLineReference[] */
	#[SerializedName('cac:OrderLineReference')]
	public array $OrderLineReference;

	/** @var DespatchLineReference[] */
	#[SerializedName('cac:DespatchLineReference')]
	public array $DespatchLineReference;

	/** @var ReceiptLineReference[] */
	#[SerializedName('cac:ReceiptLineReference')]
	public array $ReceiptLineReference;

	/** @var BillingReference[] */
	#[SerializedName('cac:BillingReference')]
	public array $BillingReference;

	/** @var DocumentReference[] */
	#[SerializedName('cac:DocumentReference')]
	public array $DocumentReference;

	/** @var PricingReference */
	#[SerializedName('cac:PricingReference')]
	public $PricingReference;

	/** @var OriginatorParty */
	#[SerializedName('cac:OriginatorParty')]
	public $OriginatorParty;

	/** @var Delivery[] */
	#[SerializedName('cac:Delivery')]
	public array $Delivery;

	/** @var PaymentTerms[] */
	#[SerializedName('cac:PaymentTerms')]
	public array $PaymentTerms;

	/** @var AllowanceCharge[] */
	#[SerializedName('cac:AllowanceCharge')]
	public array $AllowanceCharge;

	/** @var TaxTotal[] */
	#[SerializedName('cac:TaxTotal')]
	public array $TaxTotal;

	/** @var WithholdingTaxTotal[] */
	#[SerializedName('cac:WithholdingTaxTotal')]
	public array $WithholdingTaxTotal;

	/** @var Item */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cac:Item')]
	public $Item;

	/** @var Price */
	#[SerializedName('cac:Price')]
	public $Price;

	/** @var DeliveryTerms */
	#[SerializedName('cac:DeliveryTerms')]
	public $DeliveryTerms;

	/** @var SubInvoiceLine[] */
	#[SerializedName('cac:SubInvoiceLine')]
	public array $SubInvoiceLine;

	/** @var ItemPriceExtension */
	#[SerializedName('cac:ItemPriceExtension')]
	public $ItemPriceExtension;
}
