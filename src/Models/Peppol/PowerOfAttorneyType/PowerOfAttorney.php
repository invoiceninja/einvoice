<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\PowerOfAttorneyType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\MandateDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\AgentParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\NotaryParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\WitnessParty;
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

class PowerOfAttorney
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:IssueDate')]
	public DateTime $IssueDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:IssueTime')]
	public DateTime $IssueTime;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var NotaryParty */
	#[SerializedName('cac:NotaryParty')]
	public $NotaryParty;

	/** @var AgentParty */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cac:AgentParty')]
	public $AgentParty;

	/** @var WitnessParty[] */
	#[SerializedName('cac:WitnessParty')]
	public array $WitnessParty;

	/** @var MandateDocumentReference[] */
	#[SerializedName('cac:MandateDocumentReference')]
	public array $MandateDocumentReference;
}
