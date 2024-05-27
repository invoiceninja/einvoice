<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PriceListType\PreviousPriceList;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;

class PriceList
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:StatusCode')]
	public string $StatusCode;

	/** @var ValidityPeriod[] */
	#[SerializedName('cac:ValidityPeriod')]
	public array $ValidityPeriod = [];

	/** @var PreviousPriceList */
	#[SerializedName('cac:PreviousPriceList')]
	public $PreviousPriceList;
}
