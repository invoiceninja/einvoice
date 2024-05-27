<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;

class PartyName
{
	/** @var string */
	#[Length(min: null, max: 200)]
	#[SerializedName('cbc:Name')]
	public string $Name;
}
