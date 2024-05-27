<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\AmountType\PerUnitAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\TaxAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\TaxableAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\TransactionCurrencyTaxAmount;
use Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\TaxCategory;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
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

	/** @var string */
	#[SerializedName('cbc:CalculationSequenceNumeric')]
	public string $CalculationSequenceNumeric;

	/** @var TransactionCurrencyTaxAmount */
	#[SerializedName('cbc:TransactionCurrencyTaxAmount')]
	public $TransactionCurrencyTaxAmount;

	/** @var string */
	#[SerializedName('cbc:Percent')]
	public string $Percent;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:BaseUnitMeasure')]
	public string $BaseUnitMeasure;

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
