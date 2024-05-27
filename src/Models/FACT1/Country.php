<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class Country
{
	/** @var string */
	#[SerializedName('cbc:IdentificationCode')]
	public string $IdentificationCode;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;
}
