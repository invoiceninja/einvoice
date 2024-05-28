<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PriceExtensionType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\Amount;
use Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\TaxTotal;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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

class ItemPriceExtension
{
	/** @var Amount */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:Amount')]
	public $Amount;

	/** @var TaxTotal[] */
	#[SerializedName('cac:TaxTotal')]
	public array $TaxTotal;
}