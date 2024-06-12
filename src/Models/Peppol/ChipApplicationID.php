<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class ChipApplicationID
{
	/** @var string */
	#[SerializedName('#')]
	public string $value;

	/** @var string */
	#[SerializedName('@schemeID')]
	public string $schemeID;

	/** @var string */
	#[SerializedName('@schemeName')]
	public string $schemeName;

	/** @var string */
	#[SerializedName('@schemeAgencyID')]
	public string $schemeAgencyID;

	/** @var string */
	#[SerializedName('@schemeAgencyName')]
	public string $schemeAgencyName;

	/** @var string */
	#[SerializedName('@schemeVersionID')]
	public string $schemeVersionID;

	/** @var string */
	#[SerializedName('@schemeDataURI')]
	public string $schemeDataURI;

	/** @var string */
	#[SerializedName('@schemeURI')]
	public string $schemeURI;

	/** @var string */
	#[SerializedName('@listURI')]
	public string $listURI;

	/** @var string */
	#[SerializedName('@listSchemeURI')]
	public string $listSchemeURI;
}
