<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\DeliveryType\ContractualDelivery;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ContractDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\PeriodType\NominationPeriod;
use Invoiceninja\Einvoice\Models\Peppol\PeriodType\ValidityPeriod;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class Contract
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

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:NominationDate')]
	public DateTime $NominationDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:NominationTime')]
	public DateTime $NominationTime;

	/** @var string */
	#[SerializedName('cbc:ContractTypeCode')]
	public string $ContractTypeCode;

	/** @var string */
	#[SerializedName('cbc:ContractType')]
	public string $ContractType;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var string */
	#[SerializedName('cbc:VersionID')]
	public string $VersionID;

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
