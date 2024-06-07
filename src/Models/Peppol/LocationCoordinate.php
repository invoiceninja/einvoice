<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

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
