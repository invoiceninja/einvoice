<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\AttachmentType\DigitalSignatureAttachment;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\OriginalDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\SignatoryParty;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;

class Signature
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ValidationDate')]
	public DateTime $ValidationDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ValidationTime')]
	public DateTime $ValidationTime;

	/** @var string */
	#[SerializedName('cbc:ValidatorID')]
	public string $ValidatorID;

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
