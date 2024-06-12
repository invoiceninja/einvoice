<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\LineReferenceType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\LineStatusCode;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\LineID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\UUID;
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

class ReceiptLineReference
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

	/** @var LineStatusCode */
	#[SerializedName('cbc:LineStatusCode')]
	public $LineStatusCode;

	/** @var DocumentReference */
	#[SerializedName('cac:DocumentReference')]
	public $DocumentReference;
}
