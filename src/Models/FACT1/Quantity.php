<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class Quantity
{
	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('#')]
	public string $amount;

	/** @var string */
	#[SerializedName('@unitCode')]
	public string $unitCode;
}
