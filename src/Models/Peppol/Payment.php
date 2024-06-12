<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PaidAmount;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\InstructionID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class Payment
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var PaidAmount */
	#[SerializedName('cbc:PaidAmount')]
	public $PaidAmount;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ReceivedDate')]
	public DateTime $ReceivedDate;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:PaidDate')]
	public DateTime $PaidDate;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:PaidTime')]
	public DateTime $PaidTime;

	/** @var InstructionID */
	#[SerializedName('cbc:InstructionID')]
	public $InstructionID;
}
