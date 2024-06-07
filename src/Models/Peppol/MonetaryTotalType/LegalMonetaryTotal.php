<?php

namespace Invoiceninja\Einvoice\Models\Peppol\MonetaryTotalType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\AllowanceTotalAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\ChargeTotalAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\LineExtensionAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\PayableAlternativeAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\PayableAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\PayableRoundingAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\PrepaidAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\TaxExclusiveAmount;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\TaxInclusiveAmount;
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
