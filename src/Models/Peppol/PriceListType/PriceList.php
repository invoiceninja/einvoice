<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\PriceListType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\StatusCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\ValidityPeriod;
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

class PriceList
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var StatusCode */
	#[SerializedName('cbc:StatusCode')]
	public $StatusCode;

	/** @var ValidityPeriod[] */
	#[SerializedName('cac:ValidityPeriod')]
	public array $ValidityPeriod;

	/** @var PreviousPriceList */
	#[SerializedName('cac:PreviousPriceList')]
	public $PreviousPriceList;
}
