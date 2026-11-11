<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\PeriodType;

use InvoiceNinja\EInvoice\Validation\ValidationGroups;
use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Normalizers\DateDenormalizer;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\DescriptionCode;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\DurationMeasure;
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
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

class InvoicePeriod
{
	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d', DateDenormalizer::STRICT_DATE => true])]
	#[SerializedName('cbc:StartDate')]
	public ?DateTime $StartDate = null;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:StartTime')]
	public DateTime $StartTime;

	/** @var ?\DateTime */
	#[GreaterThanOrEqual(propertyPath: 'StartDate', groups: ['Default', ValidationGroups::INVOICE_SETTINGS])]
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d', DateDenormalizer::STRICT_DATE => true])]
	#[SerializedName('cbc:EndDate')]
	public ?DateTime $EndDate = null;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:EndTime')]
	public DateTime $EndTime;

	/** @var DurationMeasure */
	#[SerializedName('cbc:DurationMeasure')]
	public $DurationMeasure;

	/** @var DescriptionCode[] */
	#[SerializedName('cbc:DescriptionCode')]
	public array $DescriptionCode;

	/** @var string */
	#[\InvoiceNinja\EInvoice\Validation\Constraints\RelativeDateExpression(groups: [ValidationGroups::INVOICE_SETTINGS])]
	#[SerializedName('cbc:Description')]
	public string $Description;
}
