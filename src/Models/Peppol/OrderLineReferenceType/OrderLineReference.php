<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\OrderLineReferenceType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\LineStatusCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\LineID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\SalesOrderLineID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\UUID;
use InvoiceNinja\EInvoice\Models\Peppol\OrderReferenceType\OrderReference;
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

class OrderLineReference
{
	/** @var LineID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:LineID')]
	public $LineID;

	/** @var SalesOrderLineID */
	#[SerializedName('cbc:SalesOrderLineID')]
	public $SalesOrderLineID;

	/** @var UUID */
	#[SerializedName('cbc:UUID')]
	public $UUID;

	/** @var LineStatusCode */
	#[SerializedName('cbc:LineStatusCode')]
	public $LineStatusCode;

	/** @var OrderReference */
	#[SerializedName('cac:OrderReference')]
	public $OrderReference;
}
