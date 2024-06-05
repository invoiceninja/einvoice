<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Peppol\AddressType\JurisdictionRegionAddress;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

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
	public array $JurisdictionRegionAddress;
}
