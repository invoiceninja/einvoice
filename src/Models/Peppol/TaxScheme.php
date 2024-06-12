<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\AddressType\JurisdictionRegionAddress;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CurrencyCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TaxTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class TaxScheme
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var TaxTypeCode */
	#[SerializedName('cbc:TaxTypeCode')]
	public $TaxTypeCode;

	/** @var CurrencyCode */
	#[SerializedName('cbc:CurrencyCode')]
	public $CurrencyCode;

	/** @var JurisdictionRegionAddress[] */
	#[SerializedName('cac:JurisdictionRegionAddress')]
	public array $JurisdictionRegionAddress;
}
