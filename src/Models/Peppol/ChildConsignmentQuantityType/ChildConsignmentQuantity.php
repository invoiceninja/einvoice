<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ChildConsignmentQuantityType;

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

class ChildConsignmentQuantity
{
	/** @var string */
	#[SerializedName('#')]
	public string $value;

	/** @var string */
	#[SerializedName('@unitCode')]
	public string $unitCode;

	/** @var string */
	#[SerializedName('@unitCodeListID')]
	public string $unitCodeListID;

	/** @var string */
	#[SerializedName('@unitCodeListAgencyID')]
	public string $unitCodeListAgencyID;

	/** @var string */
	#[SerializedName('@unitCodeListAgencyName')]
	public string $unitCodeListAgencyName;
}
