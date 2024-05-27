<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PaymentMeansType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\CardAccountType\CardAccount;
use Invoiceninja\Einvoice\Models\FACT1\CreditAccountType\CreditAccount;
use Invoiceninja\Einvoice\Models\FACT1\FinancialAccountType\PayeeFinancialAccount;
use Invoiceninja\Einvoice\Models\FACT1\FinancialAccountType\PayerFinancialAccount;
use Invoiceninja\Einvoice\Models\FACT1\PaymentMandateType\PaymentMandate;
use Invoiceninja\Einvoice\Models\FACT1\TradeFinancingType\TradeFinancing;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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

class PaymentMeans
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:PaymentMeansCode')]
	public string $PaymentMeansCode;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:PaymentDueDate')]
	public DateTime $PaymentDueDate;

	/** @var string */
	#[SerializedName('cbc:PaymentChannelCode')]
	public string $PaymentChannelCode;

	/** @var string */
	#[SerializedName('cbc:InstructionID')]
	public string $InstructionID;

	/** @var string */
	#[SerializedName('cbc:InstructionNote')]
	public string $InstructionNote;

	/** @var string */
	#[Length(min: null, max: 140)]
	#[SerializedName('cbc:PaymentID')]
	public string $PaymentID;

	/** @var CardAccount */
	#[SerializedName('cac:CardAccount')]
	public $CardAccount;

	/** @var PayerFinancialAccount */
	#[SerializedName('cac:PayerFinancialAccount')]
	public $PayerFinancialAccount;

	/** @var PayeeFinancialAccount */
	#[SerializedName('cac:PayeeFinancialAccount')]
	public $PayeeFinancialAccount;

	/** @var CreditAccount */
	#[SerializedName('cac:CreditAccount')]
	public $CreditAccount;

	/** @var PaymentMandate */
	#[SerializedName('cac:PaymentMandate')]
	public $PaymentMandate;

	/** @var TradeFinancing */
	#[SerializedName('cac:TradeFinancing')]
	public $TradeFinancing;
}
