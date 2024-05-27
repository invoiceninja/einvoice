<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\MandateDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\AgentParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\NotaryParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\WitnessParty;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class PowerOfAttorney
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

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
