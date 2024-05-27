<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\PerUnitAmount;
use Invoiceninja\Einvoice\Models\FACT1\TaxSchemeType\TaxScheme;
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

class ClassifiedTaxCategory
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var string */
	#[SerializedName('cbc:Percent')]
	public string $Percent;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:BaseUnitMeasure')]
	public string $BaseUnitMeasure;

	/** @var PerUnitAmount */
	#[SerializedName('cbc:PerUnitAmount')]
	public $PerUnitAmount;

	/** @var string */
	#[SerializedName('cbc:TaxExemptionReasonCode')]
	public string $TaxExemptionReasonCode;

	/** @var string */
	#[Length(min: null, max: 100)]
	#[SerializedName('cbc:TaxExemptionReason')]
	public string $TaxExemptionReason;

	/** @var string */
	#[SerializedName('cbc:TierRange')]
	public string $TierRange;

	/** @var string */
	#[SerializedName('cbc:TierRatePercent')]
	public string $TierRatePercent;

	/** @var TaxScheme */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cac:TaxScheme')]
	public $TaxScheme;
}
