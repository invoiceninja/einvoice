<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ProjectReferenceType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\UUID;
use InvoiceNinja\EInvoice\Models\Peppol\WorkPhaseReferenceType\WorkPhaseReference;
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

class ProjectReference
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var UUID */
	#[SerializedName('cbc:UUID')]
	public $UUID;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:IssueDate')]
	public DateTime $IssueDate;

	/** @var WorkPhaseReference[] */
	#[SerializedName('cac:WorkPhaseReference')]
	public array $WorkPhaseReference;
}
