<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\WorkPhaseCode;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\WorkOrderDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class WorkPhaseReference
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var WorkPhaseCode */
	#[SerializedName('cbc:WorkPhaseCode')]
	public $WorkPhaseCode;

	/** @var string */
	#[SerializedName('cbc:WorkPhase')]
	public string $WorkPhase;

	/** @var string */
	#[SerializedName('cbc:ProgressPercent')]
	public string $ProgressPercent;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:StartDate')]
	public ?DateTime $StartDate;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:EndDate')]
	public ?DateTime $EndDate;

	/** @var WorkOrderDocumentReference[] */
	#[SerializedName('cac:WorkOrderDocumentReference')]
	public array $WorkOrderDocumentReference;
}
