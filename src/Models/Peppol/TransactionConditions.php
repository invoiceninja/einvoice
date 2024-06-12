<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ActionCode;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class TransactionConditions
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var ActionCode */
	#[SerializedName('cbc:ActionCode')]
	public $ActionCode;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var DocumentReference[] */
	#[SerializedName('cac:DocumentReference')]
	public array $DocumentReference;
}
