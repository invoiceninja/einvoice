<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ExchangeRateType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\ContractType\ForeignExchangeContract;
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

class ExchangeRate
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

	/** @var string */
	#[SerializedName('cbc:ExchangeMarketID')]
	public string $ExchangeMarketID;

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
