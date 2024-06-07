<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\StatusType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\ConditionType\Condition;
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

class CurrentStatus
{
	/** @var string */
	#[SerializedName('cbc:ConditionCode')]
	public string $ConditionCode;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ReferenceDate')]
	public DateTime $ReferenceDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ReferenceTime')]
	public DateTime $ReferenceTime;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var string */
	#[SerializedName('cbc:StatusReasonCode')]
	public string $StatusReasonCode;

	/** @var string */
	#[SerializedName('cbc:StatusReason')]
	public string $StatusReason;

	/** @var string */
	#[SerializedName('cbc:SequenceID')]
	public string $SequenceID;

	/** @var string */
	#[SerializedName('cbc:Text')]
	public string $Text;

	/** @var bool */
	#[SerializedName('cbc:IndicationIndicator')]
	public bool $IndicationIndicator;

	/** @var string */
	#[SerializedName('cbc:Percent')]
	public string $Percent;

	/** @var string */
	#[SerializedName('cbc:ReliabilityPercent')]
	public string $ReliabilityPercent;

	/** @var Condition[] */
	#[SerializedName('cac:Condition')]
	public array $Condition;
}
