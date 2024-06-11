<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PerUnitAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\TaxAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\TaxableAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\TransactionCurrencyTaxAmount;
use InvoiceNinja\EInvoice\Models\Peppol\BaseUnitMeasureType\BaseUnitMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\CalculationSequenceNumericType\CalculationSequenceNumeric;
use InvoiceNinja\EInvoice\Models\Peppol\TaxCategoryType\TaxCategory;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class TaxSubtotal
{
	/** @var TaxableAmount */
	#[SerializedName('cbc:TaxableAmount')]
	public $TaxableAmount;

	/** @var TaxAmount */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:TaxAmount')]
	public $TaxAmount;

	/** @var CalculationSequenceNumeric */
	#[SerializedName('cbc:CalculationSequenceNumeric')]
	public $CalculationSequenceNumeric;

	/** @var TransactionCurrencyTaxAmount */
	#[SerializedName('cbc:TransactionCurrencyTaxAmount')]
	public $TransactionCurrencyTaxAmount;

	/** @var string */
	#[SerializedName('cbc:Percent')]
	public string $Percent;

	/** @var BaseUnitMeasure */
	#[SerializedName('cbc:BaseUnitMeasure')]
	public $BaseUnitMeasure;

	/** @var PerUnitAmount */
	#[SerializedName('cbc:PerUnitAmount')]
	public $PerUnitAmount;

	/** @var string */
	#[SerializedName('cbc:TierRange')]
	public string $TierRange;

	/** @var string */
	#[SerializedName('cbc:TierRatePercent')]
	public string $TierRatePercent;

	/** @var TaxCategory */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cac:TaxCategory')]
	public $TaxCategory;
}
