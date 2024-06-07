<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\TradingTermsType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\ApplicableAddress;
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

class HaulageTradingTerms
{
	/** @var string */
	#[SerializedName('cbc:Information')]
	public string $Information;

	/** @var string */
	#[SerializedName('cbc:Reference')]
	public string $Reference;

	/** @var ApplicableAddress */
	#[SerializedName('cac:ApplicableAddress')]
	public $ApplicableAddress;
}
