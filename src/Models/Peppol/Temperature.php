<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class Temperature
{
	/** @var string */
	#[SerializedName('cbc:AttributeID')]
	public string $AttributeID;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:Measure')]
	public string $Measure;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;
}
