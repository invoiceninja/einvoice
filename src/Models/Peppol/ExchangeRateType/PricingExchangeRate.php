<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ExchangeRateType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\ContractType\ForeignExchangeContract;
use InvoiceNinja\EInvoice\Models\Peppol\ExchangeMarketIDType\ExchangeMarketID;
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

class PricingExchangeRate
{
	/** @var string */
	#[SerializedName('cbc:SourceCurrencyCode')]
	public string $SourceCurrencyCode;

	/** @var string */
	#[SerializedName('cbc:SourceCurrencyBaseRate')]
	public string $SourceCurrencyBaseRate;

	/** @var string */
	#[SerializedName('cbc:TargetCurrencyCode')]
	public string $TargetCurrencyCode;

	/** @var string */
	#[SerializedName('cbc:TargetCurrencyBaseRate')]
	public string $TargetCurrencyBaseRate;

	/** @var ExchangeMarketID */
	#[SerializedName('cbc:ExchangeMarketID')]
	public $ExchangeMarketID;

	/** @var string */
	#[SerializedName('cbc:CalculationRate')]
	public string $CalculationRate;

	/** @var string */
	#[SerializedName('cbc:MathematicOperatorCode')]
	public string $MathematicOperatorCode;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:Date')]
	public DateTime $Date;

	/** @var ForeignExchangeContract */
	#[SerializedName('cac:ForeignExchangeContract')]
	public $ForeignExchangeContract;
}
