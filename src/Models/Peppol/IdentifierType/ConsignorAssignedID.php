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

class ConsignorAssignedID
{
	/** @var string|int */
	#[SerializedName('#')]
	public string|int $value;

	/** @var string|int */
	#[SerializedName('@schemeID')]
	public string|int $schemeID;

	/** @var string|int */
	#[SerializedName('@schemeName')]
	public string|int $schemeName;

	/** @var string|int */
	#[SerializedName('@schemeAgencyID')]
	public string|int $schemeAgencyID;

	/** @var string|int */
	#[SerializedName('@schemeAgencyName')]
	public string|int $schemeAgencyName;

	/** @var string|int */
	#[SerializedName('@schemeVersionID')]
	public string|int $schemeVersionID;

	/** @var string|int */
	#[SerializedName('@schemeDataURI')]
	public string|int $schemeDataURI;

	/** @var string|int */
	#[SerializedName('@schemeURI')]
	public string|int $schemeURI;

	/** @var string|int */
	#[SerializedName('@listURI')]
	public string|int $listURI;

	/** @var string|int */
	#[SerializedName('@listSchemeURI')]
	public string|int $listSchemeURI;
}
