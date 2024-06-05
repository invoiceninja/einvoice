<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AttachmentType\Attachment;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\Peppol\PeriodType\ValidityPeriod;
use Invoiceninja\Einvoice\Models\Peppol\ResultOfVerificationType\ResultOfVerification;
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

class ItemSpecificationDocumentReference
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var bool */
	#[SerializedName('cbc:CopyIndicator')]
	public bool $CopyIndicator;

	/** @var string */
	#[SerializedName('cbc:UUID')]
	public string $UUID;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:IssueDate')]
	public DateTime $IssueDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:IssueTime')]
	public DateTime $IssueTime;

	/** @var string */
	#[SerializedName('cbc:DocumentTypeCode')]
	public string $DocumentTypeCode;

	/** @var string */
	#[SerializedName('cbc:DocumentType')]
	public string $DocumentType;

	/** @var string */
	#[SerializedName('cbc:XPath')]
	public string $XPath;

	/** @var string */
	#[SerializedName('cbc:LanguageID')]
	public string $LanguageID;

	/** @var string */
	#[SerializedName('cbc:LocaleCode')]
	public string $LocaleCode;

	/** @var string */
	#[SerializedName('cbc:VersionID')]
	public string $VersionID;

	/** @var string */
	#[SerializedName('cbc:DocumentStatusCode')]
	public string $DocumentStatusCode;

	/** @var string */
	#[SerializedName('cbc:DocumentDescription')]
	public string $DocumentDescription;

	/** @var Attachment */
	#[SerializedName('cac:Attachment')]
	public $Attachment;

	/** @var ValidityPeriod */
	#[SerializedName('cac:ValidityPeriod')]
	public $ValidityPeriod;

	/** @var IssuerParty */
	#[SerializedName('cac:IssuerParty')]
	public $IssuerParty;

	/** @var ResultOfVerification */
	#[SerializedName('cac:ResultOfVerification')]
	public $ResultOfVerification;
}
