<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ImportanceCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class ItemPropertyGroup
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var ImportanceCode */
	#[SerializedName('cbc:ImportanceCode')]
	public $ImportanceCode;
}
