<?php

namespace Invoiceninja\Einvoice\Models\Peppol\DimensionType;

use DateTime;
use DateTimeInterface;
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

class FloorSpaceMeasurementDimension
{
    /** @var string */
    #[SerializedName('cbc:AttributeID')]
    public string $AttributeID;

    /** @var string */
    #[DecimalPrecision(2)]
    #[SerializedName('cbc:Measure')]
    public string $Measure;

    /** @var string */
    #[SerializedName('cbc:Description')]
    public string $Description;

    /** @var string */
    #[DecimalPrecision(2)]
    #[SerializedName('cbc:MinimumMeasure')]
    public string $MinimumMeasure;

    /** @var string */
    #[DecimalPrecision(2)]
    #[SerializedName('cbc:MaximumMeasure')]
    public string $MaximumMeasure;
}
