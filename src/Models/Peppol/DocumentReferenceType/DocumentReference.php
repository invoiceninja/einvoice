<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AttachmentType\Attachment;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentStatusCodeType\DocumentStatusCode;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentTypeCodeType\DocumentTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\LanguageIDType\LanguageID;
use InvoiceNinja\EInvoice\Models\Peppol\LocaleCodeType\LocaleCode;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\IssuerParty;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\ValidityPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\ResultOfVerificationType\ResultOfVerification;
use InvoiceNinja\EInvoice\Models\Peppol\UUIDType\UUID;
use InvoiceNinja\EInvoice\Models\Peppol\VersionIDType\VersionID;
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

class DocumentReference
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var bool */
	#[SerializedName('cbc:CopyIndicator')]
	public bool $CopyIndicator;

	/** @var UUID */
	#[SerializedName('cbc:UUID')]
	public $UUID;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:IssueDate')]
	public DateTime $IssueDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:IssueTime')]
	public DateTime $IssueTime;

	/** @var DocumentTypeCode */
	#[SerializedName('cbc:DocumentTypeCode')]
	public $DocumentTypeCode;

	/** @var string */
	#[SerializedName('cbc:DocumentType')]
	public string $DocumentType;

	/** @var string */
	#[SerializedName('cbc:XPath')]
	public string $XPath;

	/** @var LanguageID */
	#[SerializedName('cbc:LanguageID')]
	public $LanguageID;

	/** @var LocaleCode */
	#[SerializedName('cbc:LocaleCode')]
	public $LocaleCode;

	/** @var VersionID */
	#[SerializedName('cbc:VersionID')]
	public $VersionID;

	/** @var DocumentStatusCode */
	#[SerializedName('cbc:DocumentStatusCode')]
	public $DocumentStatusCode;

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
