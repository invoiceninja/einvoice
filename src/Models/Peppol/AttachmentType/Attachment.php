<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\AttachmentType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\ExternalReferenceType\ExternalReference;
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

class Attachment
{
	/** @var binary */
	#[SerializedName('cbc:EmbeddedDocumentBinaryObject')]
	public \binary $EmbeddedDocumentBinaryObject;

	/** @var ExternalReference */
	#[SerializedName('cac:ExternalReference')]
	public $ExternalReference;
}