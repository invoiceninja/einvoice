<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\AddressType\ApplicableAddress;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

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
