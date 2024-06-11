<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\LineIDType\LineID;
use InvoiceNinja\EInvoice\Models\Peppol\UUIDType\UUID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class LineReference
{
	/** @var LineID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:LineID')]
	public $LineID;

	/** @var UUID */
	#[SerializedName('cbc:UUID')]
	public $UUID;

	/** @var string */
	#[SerializedName('cbc:LineStatusCode')]
	public string $LineStatusCode;

	/** @var DocumentReference */
	#[SerializedName('cac:DocumentReference')]
	public $DocumentReference;
}
