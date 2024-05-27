<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\AddressType\JurisdictionRegionAddress;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;

class TaxScheme
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var string */
	#[SerializedName('cbc:TaxTypeCode')]
	public string $TaxTypeCode;

	/** @var string */
	#[SerializedName('cbc:CurrencyCode')]
	public string $CurrencyCode;

	/** @var JurisdictionRegionAddress[] */
	#[SerializedName('cac:JurisdictionRegionAddress')]
	public array $JurisdictionRegionAddress = [];
}
