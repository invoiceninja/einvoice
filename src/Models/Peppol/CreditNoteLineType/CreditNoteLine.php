<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\CreditNoteLineType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\AllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\LineExtensionAmount;
use InvoiceNinja\EInvoice\Models\Peppol\BillingReferenceType\BillingReference;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\AccountingCostCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\PaymentPurposeCode;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryTermsType\DeliveryTerms;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\Delivery;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\UUID;
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
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\CreditedQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\TaxTotalType\TaxTotal;
use InvoiceNinja\EInvoice\Models\Peppol\TaxTotalType\WithholdingTaxTotal;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class CreditNoteLine
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var UUID */
	#[SerializedName('cbc:UUID')]
	public $UUID;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var CreditedQuantity */
	#[SerializedName('cbc:CreditedQuantity')]
	public $CreditedQuantity;

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

	/** @var AccountingCostCode */
	#[SerializedName('cbc:AccountingCostCode')]
	public $AccountingCostCode;

	/** @var string */
	#[SerializedName('cbc:AccountingCost')]
	public string $AccountingCost;

	/** @var PaymentPurposeCode */
	#[SerializedName('cbc:PaymentPurposeCode')]
	public $PaymentPurposeCode;

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
