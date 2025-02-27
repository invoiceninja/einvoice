<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\AttachmentType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\ExternalReferenceType\ExternalReference;
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
use InvoiceNinja\EInvoice\Models\Peppol\EmbeddedDocumentBinaryObjectType\EmbeddedDocumentBinaryObject;
class Attachment
{
	/** @var EmbeddedDocumentBinaryObject */
	#[SerializedName('cbc:EmbeddedDocumentBinaryObject')]
	public $EmbeddedDocumentBinaryObject;

	/** @var ExternalReference */
	#[SerializedName('cac:ExternalReference')]
	public $ExternalReference;
}
