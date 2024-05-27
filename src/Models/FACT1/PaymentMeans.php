<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\CardAccountType\CardAccount;
use Invoiceninja\Einvoice\Models\FACT1\CreditAccountType\CreditAccount;
use Invoiceninja\Einvoice\Models\FACT1\FinancialAccountType\PayeeFinancialAccount;
use Invoiceninja\Einvoice\Models\FACT1\FinancialAccountType\PayerFinancialAccount;
use Invoiceninja\Einvoice\Models\FACT1\PaymentMandateType\PaymentMandate;
use Invoiceninja\Einvoice\Models\FACT1\TradeFinancingType\TradeFinancing;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class PaymentMeans
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	private array $PaymentMeansCode_array = [
		1,
		2,
		3,
		4,
		5,
		6,
		7,
		8,
		9,
		10,
		11,
		12,
		13,
		14,
		15,
		16,
		17,
		18,
		19,
		20,
		21,
		22,
		23,
		24,
		25,
		26,
		27,
		28,
		29,
		30,
		31,
		32,
		33,
		34,
		35,
		36,
		37,
		38,
		39,
		40,
		41,
		42,
		43,
		44,
		45,
		46,
		47,
		48,
		49,
		50,
		51,
		52,
		53,
		60,
		61,
		62,
		63,
		64,
		65,
		66,
		67,
		70,
		74,
		75,
		76,
		77,
		78,
		91,
		92,
		93,
		94,
		95,
		96,
		97,
		'ZZZ',
	];

	/** @var string */
	#[Choice([
		1,
		2,
		3,
		4,
		5,
		6,
		7,
		8,
		9,
		10,
		11,
		12,
		13,
		14,
		15,
		16,
		17,
		18,
		19,
		20,
		21,
		22,
		23,
		24,
		25,
		26,
		27,
		28,
		29,
		30,
		31,
		32,
		33,
		34,
		35,
		36,
		37,
		38,
		39,
		40,
		41,
		42,
		43,
		44,
		45,
		46,
		47,
		48,
		49,
		50,
		51,
		52,
		53,
		60,
		61,
		62,
		63,
		64,
		65,
		66,
		67,
		70,
		74,
		75,
		76,
		77,
		78,
		91,
		92,
		93,
		94,
		95,
		96,
		97,
		'ZZZ',
	])]
	#[SerializedName('cbc:PaymentMeansCode')]
	public string $PaymentMeansCode;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:PaymentDueDate')]
	public \DateTime $PaymentDueDate;

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
