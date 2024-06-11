<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\CardAccountType\CardAccount;
use InvoiceNinja\EInvoice\Models\Peppol\CreditAccountType\CreditAccount;
use InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType\PayeeFinancialAccount;
use InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType\PayerFinancialAccount;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\InstructionIDType\InstructionID;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentChannelCodeType\PaymentChannelCode;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentIDType\PaymentID;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentMandateType\PaymentMandate;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentMeansCodeType\PaymentMeansCode;
use InvoiceNinja\EInvoice\Models\Peppol\TradeFinancingType\TradeFinancing;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class PaymentMeans
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var PaymentMeansCode */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:PaymentMeansCode')]
	public $PaymentMeansCode;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:PaymentDueDate')]
	public \DateTime $PaymentDueDate;

	/** @var PaymentChannelCode */
	#[SerializedName('cbc:PaymentChannelCode')]
	public $PaymentChannelCode;

	/** @var InstructionID */
	#[SerializedName('cbc:InstructionID')]
	public $InstructionID;

	/** @var string */
	#[SerializedName('cbc:InstructionNote')]
	public string $InstructionNote;

	/** @var PaymentID[] */
	#[SerializedName('cbc:PaymentID')]
	public array $PaymentID;

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
