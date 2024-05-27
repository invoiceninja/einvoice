<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\WorkOrderDocumentReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;

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
