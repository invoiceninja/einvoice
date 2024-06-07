<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\Amount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\BaseAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PerUnitAmount;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentMeansType\PaymentMeans;
use InvoiceNinja\EInvoice\Models\Peppol\TaxCategoryType\TaxCategory;
use InvoiceNinja\EInvoice\Models\Peppol\TaxTotalType\TaxTotal;
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

class AllowanceCharge
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var bool */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ChargeIndicator')]
	public bool $ChargeIndicator;

	/** @var string */
	#[SerializedName('cbc:AllowanceChargeReasonCode')]
	public string $AllowanceChargeReasonCode;

	/** @var string */
	#[SerializedName('cbc:AllowanceChargeReason')]
	public string $AllowanceChargeReason;

	/** @var string */
	#[SerializedName('cbc:MultiplierFactorNumeric')]
	public string $MultiplierFactorNumeric;

	/** @var bool */
	#[SerializedName('cbc:PrepaidIndicator')]
	public bool $PrepaidIndicator;

	/** @var string */
	#[SerializedName('cbc:SequenceNumeric')]
	public string $SequenceNumeric;

	/** @var Amount */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:Amount')]
	public $Amount;

	/** @var BaseAmount */
	#[SerializedName('cbc:BaseAmount')]
	public $BaseAmount;

	/** @var string */
	#[SerializedName('cbc:AccountingCostCode')]
	public string $AccountingCostCode;

	/** @var string */
	#[SerializedName('cbc:AccountingCost')]
	public string $AccountingCost;

	/** @var PerUnitAmount */
	#[SerializedName('cbc:PerUnitAmount')]
	public $PerUnitAmount;

	/** @var TaxCategory[] */
	#[SerializedName('cac:TaxCategory')]
	public array $TaxCategory;

	/** @var TaxTotal */
	#[SerializedName('cac:TaxTotal')]
	public $TaxTotal;

	/** @var PaymentMeans[] */
	#[SerializedName('cac:PaymentMeans')]
	public array $PaymentMeans;
}
