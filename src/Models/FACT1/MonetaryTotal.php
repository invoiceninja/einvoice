<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\AmountType\AllowanceTotalAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\ChargeTotalAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\LineExtensionAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\PayableAlternativeAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\PayableAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\PayableRoundingAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\PrepaidAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\TaxExclusiveAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\TaxInclusiveAmount;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class MonetaryTotal
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
