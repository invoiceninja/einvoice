<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\DimensionType\MeasurementDimension;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

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
