<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\TaxCategoryType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PerUnitAmount;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TaxExemptionReasonCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\BaseUnitMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\TaxSchemeType\TaxScheme;
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
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var string */
	#[SerializedName('cbc:Percent')]
	public string $Percent;

	/** @var BaseUnitMeasure */
	#[SerializedName('cbc:BaseUnitMeasure')]
	public $BaseUnitMeasure;

	/** @var PerUnitAmount */
	#[SerializedName('cbc:PerUnitAmount')]
	public $PerUnitAmount;

	/** @var TaxExemptionReasonCode */
	#[SerializedName('cbc:TaxExemptionReasonCode')]
	public $TaxExemptionReasonCode;

	/** @var string */
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
