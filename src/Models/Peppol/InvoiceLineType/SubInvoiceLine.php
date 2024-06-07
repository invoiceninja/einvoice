<?php

namespace Invoiceninja\Einvoice\Models\Peppol\InvoiceLineType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\LineExtensionAmount;
use Invoiceninja\Einvoice\Models\Peppol\BillingReferenceType\BillingReference;
use Invoiceninja\Einvoice\Models\Peppol\DeliveryTermsType\DeliveryTerms;
use Invoiceninja\Einvoice\Models\Peppol\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\ItemType\Item;
use Invoiceninja\Einvoice\Models\Peppol\LineReferenceType\DespatchLineReference;
use Invoiceninja\Einvoice\Models\Peppol\LineReferenceType\ReceiptLineReference;
use Invoiceninja\Einvoice\Models\Peppol\OrderLineReferenceType\OrderLineReference;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\OriginatorParty;
use Invoiceninja\Einvoice\Models\Peppol\PaymentTermsType\PaymentTerms;
use Invoiceninja\Einvoice\Models\Peppol\PeriodType\InvoicePeriod;
use Invoiceninja\Einvoice\Models\Peppol\PriceExtensionType\ItemPriceExtension;
use Invoiceninja\Einvoice\Models\Peppol\PriceType\Price;
use Invoiceninja\Einvoice\Models\Peppol\PricingReferenceType\PricingReference;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\InvoicedQuantity;
use Invoiceninja\Einvoice\Models\Peppol\TaxTotalType\TaxTotal;
use Invoiceninja\Einvoice\Models\Peppol\TaxTotalType\WithholdingTaxTotal;
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

class SubInvoiceLine
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

    /** @var ItemPriceExtension */
    #[SerializedName('cac:ItemPriceExtension')]
    public $ItemPriceExtension;
}
