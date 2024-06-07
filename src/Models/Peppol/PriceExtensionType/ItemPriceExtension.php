<?php

namespace Invoiceninja\Einvoice\Models\Peppol\PriceExtensionType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\Amount;
use Invoiceninja\Einvoice\Models\Peppol\TaxTotalType\TaxTotal;
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

class ItemPriceExtension
{
    /** @var Amount */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    #[SerializedName('cbc:Amount')]
    public $Amount;

    /** @var TaxTotal[] */
    #[SerializedName('cac:TaxTotal')]
    public array $TaxTotal;
}
