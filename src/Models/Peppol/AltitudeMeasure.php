<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class AltitudeMeasure
{
	/** @var string */
	#[SerializedName('#')]
	public string $value;

	/** @var string */
	#[SerializedName('@unitCode')]
	public string $unitCode;

	/** @var string */
	#[SerializedName('@unitCodeListVersionID')]
	public string $unitCodeListVersionID;
}
