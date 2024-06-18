<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\AttachmentType\DigitalSignatureAttachment;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\OriginalDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ValidatorID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\SignatoryParty;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Signature
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ValidationDate')]
	public ?DateTime $ValidationDate;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ValidationTime')]
	public ?DateTime $ValidationTime;

	/** @var ValidatorID */
	#[SerializedName('cbc:ValidatorID')]
	public $ValidatorID;

	/** @var string */
	#[SerializedName('cbc:CanonicalizationMethod')]
	public string $CanonicalizationMethod;

	/** @var string */
	#[SerializedName('cbc:SignatureMethod')]
	public string $SignatureMethod;

	/** @var SignatoryParty */
	#[SerializedName('cac:SignatoryParty')]
	public $SignatoryParty;

	/** @var DigitalSignatureAttachment */
	#[SerializedName('cac:DigitalSignatureAttachment')]
	public $DigitalSignatureAttachment;

	/** @var OriginalDocumentReference */
	#[SerializedName('cac:OriginalDocumentReference')]
	public $OriginalDocumentReference;
}
