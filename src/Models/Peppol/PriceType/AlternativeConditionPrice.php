<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\PriceType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\AllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PriceAmount;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\PriceTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\ExchangeRateType\PricingExchangeRate;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\ValidityPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PriceListType\PriceList;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\BaseQuantity;
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

class AlternativeConditionPrice
{
	/** @var PriceAmount */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:PriceAmount')]
	public $PriceAmount;

	/** @var BaseQuantity */
	#[SerializedName('cbc:BaseQuantity')]
	public $BaseQuantity;

	/** @var string */
	#[SerializedName('cbc:PriceChangeReason')]
	public string $PriceChangeReason;

	/** @var PriceTypeCode */
	#[SerializedName('cbc:PriceTypeCode')]
	public $PriceTypeCode;

	/** @var string */
	#[SerializedName('cbc:PriceType')]
	public string $PriceType;

	/** @var string */
	#[SerializedName('cbc:OrderableUnitFactorRate')]
	public string $OrderableUnitFactorRate;

	/** @var ValidityPeriod[] */
	#[SerializedName('cac:ValidityPeriod')]
	public array $ValidityPeriod;

	/** @var PriceList */
	#[SerializedName('cac:PriceList')]
	public $PriceList;

	/** @var AllowanceCharge[] */
	#[SerializedName('cac:AllowanceCharge')]
	public array $AllowanceCharge;

	/** @var PricingExchangeRate */
	#[SerializedName('cac:PricingExchangeRate')]
	public $PricingExchangeRate;
}
