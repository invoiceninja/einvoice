<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\MonetaryTotalType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\AllowanceTotalAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\ChargeTotalAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\LineExtensionAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PayableAlternativeAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PayableAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PayableRoundingAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PrepaidAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\TaxExclusiveAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\TaxInclusiveAmount;
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

class LegalMonetaryTotal
{
	/** @var LineExtensionAmount */
	#[SerializedName('cbc:LineExtensionAmount')]
	public $LineExtensionAmount;

	/** @var TaxExclusiveAmount */
	#[SerializedName('cbc:TaxExclusiveAmount')]
	public $TaxExclusiveAmount;

	/** @var TaxInclusiveAmount */
	#[SerializedName('cbc:TaxInclusiveAmount')]
	public $TaxInclusiveAmount;

	/** @var AllowanceTotalAmount */
	#[SerializedName('cbc:AllowanceTotalAmount')]
	public $AllowanceTotalAmount;

	/** @var ChargeTotalAmount */
	#[SerializedName('cbc:ChargeTotalAmount')]
	public $ChargeTotalAmount;

	/** @var PrepaidAmount */
	#[SerializedName('cbc:PrepaidAmount')]
	public $PrepaidAmount;

	/** @var PayableRoundingAmount */
	#[SerializedName('cbc:PayableRoundingAmount')]
	public $PayableRoundingAmount;

	/** @var PayableAmount */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:PayableAmount')]
	public $PayableAmount;

	/** @var PayableAlternativeAmount */
	#[SerializedName('cbc:PayableAlternativeAmount')]
	public $PayableAlternativeAmount;
}
