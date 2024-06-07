<?php

namespace Invoiceninja\Einvoice\Models\Peppol\ItemPropertyType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\DimensionType\RangeDimension;
use Invoiceninja\Einvoice\Models\Peppol\ItemPropertyGroupType\ItemPropertyGroup;
use Invoiceninja\Einvoice\Models\Peppol\ItemPropertyRangeType\ItemPropertyRange;
use Invoiceninja\Einvoice\Models\Peppol\PeriodType\UsabilityPeriod;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\ValueQuantity;
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

class AdditionalItemProperty
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var string */
    #[SerializedName('cbc:Name')]
    public string $Name;

    /** @var string */
    #[SerializedName('cbc:NameCode')]
    public string $NameCode;

    /** @var string */
    #[SerializedName('cbc:TestMethod')]
    public string $TestMethod;

    /** @var string */
    #[SerializedName('cbc:Value')]
    public string $Value;

    /** @var ValueQuantity */
    #[SerializedName('cbc:ValueQuantity')]
    public $ValueQuantity;

    /** @var string */
    #[SerializedName('cbc:ValueQualifier')]
    public string $ValueQualifier;

    /** @var string */
    #[SerializedName('cbc:ImportanceCode')]
    public string $ImportanceCode;

    /** @var string */
    #[SerializedName('cbc:ListValue')]
    public string $ListValue;

    /** @var UsabilityPeriod */
    #[SerializedName('cac:UsabilityPeriod')]
    public $UsabilityPeriod;

    /** @var ItemPropertyGroup[] */
    #[SerializedName('cac:ItemPropertyGroup')]
    public array $ItemPropertyGroup;

    /** @var RangeDimension */
    #[SerializedName('cac:RangeDimension')]
    public $RangeDimension;

    /** @var ItemPropertyRange */
    #[SerializedName('cac:ItemPropertyRange')]
    public $ItemPropertyRange;
}
