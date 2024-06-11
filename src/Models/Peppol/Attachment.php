<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\ExternalReferenceType\ExternalReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class Attachment
{
	/** @var mixed */
	#[SerializedName('cbc:EmbeddedDocumentBinaryObject')]
	public mixed $EmbeddedDocumentBinaryObject;

	/** @var ExternalReference */
	#[SerializedName('cac:ExternalReference')]
	public $ExternalReference;
}
