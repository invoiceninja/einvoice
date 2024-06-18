<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\MathematicOperatorCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\SourceCurrencyCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TargetCurrencyCode;
use InvoiceNinja\EInvoice\Models\Peppol\ContractType\ForeignExchangeContract;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ExchangeMarketID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class ExchangeRate
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

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:Date')]
	public ?DateTime $Date;

	/** @var ForeignExchangeContract */
	#[SerializedName('cac:ForeignExchangeContract')]
	public $ForeignExchangeContract;
}
