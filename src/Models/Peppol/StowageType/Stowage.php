<?php

namespace Invoiceninja\Einvoice\Models\Peppol\StowageType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\DimensionType\MeasurementDimension;
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

class Stowage
{
    /** @var string */
    #[SerializedName('cbc:LocationID')]
    public string $LocationID;

    /** @var string */
    #[SerializedName('cbc:Location')]
    public string $Location;

    /** @var MeasurementDimension[] */
    #[SerializedName('cac:MeasurementDimension')]
    public array $MeasurementDimension;
}
