<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class LineCountNumeric
{
	/** @var string */
	#[SerializedName('#')]
	public string $value;

	/** @var string */
	#[SerializedName('@format')]
	public string $format;
}
