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

class ItemClassificationCode
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
