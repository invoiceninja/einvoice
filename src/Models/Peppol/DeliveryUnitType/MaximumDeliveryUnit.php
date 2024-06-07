<?php

namespace Invoiceninja\Einvoice\Models\Peppol\DeliveryUnitType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\BatchQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\ConsumerUnitQuantity;
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

class MaximumDeliveryUnit
{
    /** @var BatchQuantity */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    #[SerializedName('cbc:BatchQuantity')]
    public $BatchQuantity;

    /** @var ConsumerUnitQuantity */
    #[SerializedName('cbc:ConsumerUnitQuantity')]
    public $ConsumerUnitQuantity;

    /** @var bool */
    #[SerializedName('cbc:HazardousRiskIndicator')]
    public bool $HazardousRiskIndicator;
}
