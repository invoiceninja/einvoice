<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\CodeType\DescriptionCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\PositionCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\AttributeID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class PhysicalAttribute
{
	/** @var AttributeID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:AttributeID')]
	public $AttributeID;

	/** @var PositionCode */
	#[SerializedName('cbc:PositionCode')]
	public $PositionCode;

	/** @var DescriptionCode */
	#[SerializedName('cbc:DescriptionCode')]
	public $DescriptionCode;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;
}
