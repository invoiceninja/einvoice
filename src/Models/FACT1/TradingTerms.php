<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\AddressType\ApplicableAddress;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;

class TradingTerms
{
	/** @var string */
	#[SerializedName('cbc:Information')]
	public string $Information;

	/** @var string */
	#[SerializedName('cbc:Reference')]
	public string $Reference;

	/** @var ApplicableAddress */
	#[SerializedName('cac:ApplicableAddress')]
	public $ApplicableAddress;
}
