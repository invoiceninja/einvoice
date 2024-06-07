<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\ContractType\ForeignExchangeContract;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

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
