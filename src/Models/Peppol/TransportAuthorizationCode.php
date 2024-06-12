<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class TransportAuthorizationCode
{
	/** @var string */
	#[SerializedName('#')]
	public string $value;

	/** @var string */
	#[SerializedName('@listID')]
	public string $listID;

	/** @var string */
	#[SerializedName('@listAgencyID')]
	public string $listAgencyID;

	/** @var string */
	#[SerializedName('@listAgencyName')]
	public string $listAgencyName;

	/** @var string */
	#[SerializedName('@listName')]
	public string $listName;

	/** @var string */
	#[SerializedName('@listVersionID')]
	public string $listVersionID;

	/** @var string */
	#[SerializedName('@name')]
	public string $name;

	/** @var string */
	#[SerializedName('@languageID')]
	public string $languageID;

	/** @var string */
	#[SerializedName('@listURI')]
	public string $listURI;

	/** @var string */
	#[SerializedName('@listSchemeURI')]
	public string $listSchemeURI;
}
