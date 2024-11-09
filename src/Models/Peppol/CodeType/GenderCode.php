<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\CodeType;

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

class GenderCode
{
	/** @var int|string */
	#[SerializedName('#')]
	public int|string $value;

	/** @var int|string */
	#[SerializedName('@listID')]
	public int|string $listID;

	/** @var int|string */
	#[SerializedName('@listAgencyID')]
	public int|string $listAgencyID;

	/** @var int|string */
	#[SerializedName('@listAgencyName')]
	public int|string $listAgencyName;

	/** @var int|string */
	#[SerializedName('@listName')]
	public int|string $listName;

	/** @var int|string */
	#[SerializedName('@listVersionID')]
	public int|string $listVersionID;

	/** @var int|string */
	#[SerializedName('@name')]
	public int|string $name;

	/** @var int|string */
	#[SerializedName('@languageID')]
	public int|string $languageID;

	/** @var int|string */
	#[SerializedName('@listURI')]
	public int|string $listURI;

	/** @var int|string */
	#[SerializedName('@listSchemeURI')]
	public int|string $listSchemeURI;
}
