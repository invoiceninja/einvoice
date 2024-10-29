<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\Amount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\BaseAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PerUnitAmount;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\AccountingCostCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\AllowanceChargeReasonCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\NumericType\MultiplierFactorNumeric;
use InvoiceNinja\EInvoice\Models\Peppol\NumericType\SequenceNumeric;
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

class ExtraAllowanceCharge
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:ChargeIndicator')]
	public string $ChargeIndicator;


	/** @var AllowanceChargeReasonCode */
	#[SerializedName('cbc:AllowanceChargeReasonCode')]
	public $AllowanceChargeReasonCode;

	/** @var string */
	#[SerializedName('cbc:AllowanceChargeReason')]
	public string $AllowanceChargeReason;

	/** @var MultiplierFactorNumeric */
	#[SerializedName('cbc:MultiplierFactorNumeric')]
	public $MultiplierFactorNumeric;

	/** @var bool */
	#[SerializedName('cbc:PrepaidIndicator')]
	public bool $PrepaidIndicator;

	/** @var SequenceNumeric */
	#[SerializedName('cbc:SequenceNumeric')]
	public $SequenceNumeric;

	/** @var Amount */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:Amount')]
	public $Amount;

	/** @var BaseAmount */
	#[SerializedName('cbc:BaseAmount')]
	public $BaseAmount;

	/** @var AccountingCostCode */
	#[SerializedName('cbc:AccountingCostCode')]
	public $AccountingCostCode;

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
