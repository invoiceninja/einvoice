<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\TaxTotalType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\RoundingAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\TaxAmount;
use Invoiceninja\Einvoice\Models\Peppol\TaxSubtotalType\TaxSubtotal;
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

class WithholdingTaxTotal
{
	/** @var TaxAmount */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:TaxAmount')]
	public $TaxAmount;

	/** @var RoundingAmount */
	#[SerializedName('cbc:RoundingAmount')]
	public $RoundingAmount;

	/** @var bool */
	#[SerializedName('cbc:TaxEvidenceIndicator')]
	public bool $TaxEvidenceIndicator;

	/** @var bool */
	#[SerializedName('cbc:TaxIncludedIndicator')]
	public bool $TaxIncludedIndicator;

	/** @var TaxSubtotal[] */
	#[SerializedName('cac:TaxSubtotal')]
	public array $TaxSubtotal;
}
