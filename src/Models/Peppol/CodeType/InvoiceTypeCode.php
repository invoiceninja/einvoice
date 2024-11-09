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

class InvoiceTypeCode
{
	/** @var int|int|string */
	#[SerializedName('#')]
	public int|int|string $value;

	/** @var int|int|string */
	#[SerializedName('@listID')]
	public int|int|string $listID;

	/** @var int|int|string */
	#[SerializedName('@listAgencyID')]
	public int|int|string $listAgencyID;

	/** @var int|int|string */
	#[SerializedName('@listAgencyName')]
	public int|int|string $listAgencyName;

	/** @var int|int|string */
	#[SerializedName('@listName')]
	public int|int|string $listName;

	/** @var int|int|string */
	#[SerializedName('@listVersionID')]
	public int|int|string $listVersionID;

	/** @var int|int|string */
	#[SerializedName('@name')]
	public int|int|string $name;

	/** @var int|int|string */
	#[SerializedName('@languageID')]
	public int|int|string $languageID;

	/** @var int|int|string */
	#[SerializedName('@listURI')]
	public int|int|string $listURI;

	/** @var int|int|string */
	#[SerializedName('@listSchemeURI')]
	public int|int|string $listSchemeURI;
}
