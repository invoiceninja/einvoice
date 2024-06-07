<?php

namespace Invoiceninja\Einvoice\Models\Peppol\LocationCoordinateType;

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

class LocationCoordinate
{
    /** @var string */
    #[SerializedName('cbc:CoordinateSystemCode')]
    public string $CoordinateSystemCode;

    /** @var string */
    #[DecimalPrecision(2)]
    #[SerializedName('cbc:LatitudeDegreesMeasure')]
    public string $LatitudeDegreesMeasure;

    /** @var string */
    #[DecimalPrecision(2)]
    #[SerializedName('cbc:LatitudeMinutesMeasure')]
    public string $LatitudeMinutesMeasure;

    /** @var string */
    #[SerializedName('cbc:LatitudeDirectionCode')]
    public string $LatitudeDirectionCode;

    /** @var string */
    #[DecimalPrecision(2)]
    #[SerializedName('cbc:LongitudeDegreesMeasure')]
    public string $LongitudeDegreesMeasure;

    /** @var string */
    #[DecimalPrecision(2)]
    #[SerializedName('cbc:LongitudeMinutesMeasure')]
    public string $LongitudeMinutesMeasure;

    /** @var string */
    #[SerializedName('cbc:LongitudeDirectionCode')]
    public string $LongitudeDirectionCode;

    /** @var string */
    #[DecimalPrecision(2)]
    #[SerializedName('cbc:AltitudeMeasure')]
    public string $AltitudeMeasure;
}
