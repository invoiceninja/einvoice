<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ExchangeRateType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\ContractType\ForeignExchangeContract;
use InvoiceNinja\EInvoice\Models\Peppol\ExchangeMarketIDType\ExchangeMarketID;
use InvoiceNinja\EInvoice\Models\Peppol\MathematicOperatorCodeType\MathematicOperatorCode;
use InvoiceNinja\EInvoice\Models\Peppol\SourceCurrencyCodeType\SourceCurrencyCode;
use InvoiceNinja\EInvoice\Models\Peppol\TargetCurrencyCodeType\TargetCurrencyCode;
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

class PaymentAlternativeExchangeRate
{
	/** @var SourceCurrencyCode */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:SourceCurrencyCode')]
	public $SourceCurrencyCode;

	/** @var string */
	#[SerializedName('cbc:SourceCurrencyBaseRate')]
	public string $SourceCurrencyBaseRate;

	/** @var TargetCurrencyCode */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:TargetCurrencyCode')]
	public $TargetCurrencyCode;

	/** @var string */
	#[SerializedName('cbc:TargetCurrencyBaseRate')]
	public string $TargetCurrencyBaseRate;

	/** @var ExchangeMarketID */
	#[SerializedName('cbc:ExchangeMarketID')]
	public $ExchangeMarketID;

	/** @var string */
	#[SerializedName('cbc:CalculationRate')]
	public string $CalculationRate;

	/** @var MathematicOperatorCode */
	#[SerializedName('cbc:MathematicOperatorCode')]
	public $MathematicOperatorCode;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:Date')]
	public DateTime $Date;

	/** @var ForeignExchangeContract */
	#[SerializedName('cac:ForeignExchangeContract')]
	public $ForeignExchangeContract;
}
