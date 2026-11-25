<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\IdentifierType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class AircraftID
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
