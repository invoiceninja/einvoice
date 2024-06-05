<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class LineReference
{
	/** @var string */
	#[SerializedName('cbc:LineID')]
	public string $LineID;

	/** @var string */
	#[SerializedName('cbc:UUID')]
	public string $UUID;

	/** @var string */
	#[SerializedName('cbc:LineStatusCode')]
	public string $LineStatusCode;

	/** @var DocumentReference */
	#[SerializedName('cac:DocumentReference')]
	public $DocumentReference;
}
