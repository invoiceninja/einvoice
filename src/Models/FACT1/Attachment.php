<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\ExternalReferenceType\ExternalReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class Attachment
{
	/** @var binary */
	#[SerializedName('cbc:EmbeddedDocumentBinaryObject')]
	public \binary $EmbeddedDocumentBinaryObject;

	/** @var ExternalReference */
	#[SerializedName('cac:ExternalReference')]
	public $ExternalReference;
}
