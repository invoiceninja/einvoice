<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\PaymentMandateType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\MaximumPaidAmount;
use InvoiceNinja\EInvoice\Models\Peppol\ClauseType\Clause;
use InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType\PayerFinancialAccount;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\PayerParty;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\PaymentReversalPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\ValidityPeriod;
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

class PaymentMandate
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:MandateTypeCode')]
	public string $MandateTypeCode;

	/** @var string */
	#[SerializedName('cbc:MaximumPaymentInstructionsNumeric')]
	public string $MaximumPaymentInstructionsNumeric;

	/** @var MaximumPaidAmount */
	#[SerializedName('cbc:MaximumPaidAmount')]
	public $MaximumPaidAmount;

	/** @var string */
	#[SerializedName('cbc:SignatureID')]
	public string $SignatureID;

	/** @var PayerParty */
	#[SerializedName('cac:PayerParty')]
	public $PayerParty;

	/** @var PayerFinancialAccount */
	#[SerializedName('cac:PayerFinancialAccount')]
	public $PayerFinancialAccount;

	/** @var ValidityPeriod */
	#[SerializedName('cac:ValidityPeriod')]
	public $ValidityPeriod;

	/** @var PaymentReversalPeriod */
	#[SerializedName('cac:PaymentReversalPeriod')]
	public $PaymentReversalPeriod;

	/** @var Clause[] */
	#[SerializedName('cac:Clause')]
	public array $Clause;
}
