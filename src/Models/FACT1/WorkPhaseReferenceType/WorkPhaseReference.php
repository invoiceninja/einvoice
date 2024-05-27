<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\WorkPhaseReferenceType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\WorkOrderDocumentReference;
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

class WorkPhaseReference
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:WorkPhaseCode')]
	public string $WorkPhaseCode;

	/** @var string */
	#[SerializedName('cbc:WorkPhase')]
	public string $WorkPhase;

	/** @var string */
	#[SerializedName('cbc:ProgressPercent')]
	public string $ProgressPercent;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:StartDate')]
	public DateTime $StartDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:EndDate')]
	public DateTime $EndDate;

	/** @var WorkOrderDocumentReference[] */
	#[SerializedName('cac:WorkOrderDocumentReference')]
	public array $WorkOrderDocumentReference;
}
