<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\ContractTypeCodeType\ContractTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\ContractualDelivery;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ContractDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\NominationPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\ValidityPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\VersionIDType\VersionID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Contract
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:IssueDate')]
	public DateTime $IssueDate;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:IssueTime')]
	public DateTime $IssueTime;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:NominationDate')]
	public DateTime $NominationDate;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:NominationTime')]
	public DateTime $NominationTime;

	/** @var ContractTypeCode */
	#[SerializedName('cbc:ContractTypeCode')]
	public $ContractTypeCode;

	/** @var string */
	#[SerializedName('cbc:ContractType')]
	public string $ContractType;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var VersionID */
	#[SerializedName('cbc:VersionID')]
	public $VersionID;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var ValidityPeriod */
	#[SerializedName('cac:ValidityPeriod')]
	public $ValidityPeriod;

	/** @var ContractDocumentReference[] */
	#[SerializedName('cac:ContractDocumentReference')]
	public array $ContractDocumentReference;

	/** @var NominationPeriod */
	#[SerializedName('cac:NominationPeriod')]
	public $NominationPeriod;

	/** @var ContractualDelivery */
	#[SerializedName('cac:ContractualDelivery')]
	public $ContractualDelivery;
}
