<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;

class Period
{
	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:StartDate')]
	public DateTime $StartDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:StartTime')]
	public DateTime $StartTime;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:EndDate')]
	public DateTime $EndDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:EndTime')]
	public DateTime $EndTime;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:DurationMeasure')]
	public string $DurationMeasure;
	private array $DescriptionCode_array = [3, 35, 432];

	/** @var string */
	#[Choice([3, 35, 432])]
	#[SerializedName('cbc:DescriptionCode')]
	public string $DescriptionCode;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;
}
