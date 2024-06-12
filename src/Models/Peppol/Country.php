<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\CodeType\IdentificationCode;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class Country
{
	/** @var IdentificationCode */
	#[SerializedName('cbc:IdentificationCode')]
	public $IdentificationCode;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;
}
