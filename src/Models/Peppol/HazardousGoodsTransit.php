<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\TemperatureType\MaximumTemperature;
use Invoiceninja\Einvoice\Models\Peppol\TemperatureType\MinimumTemperature;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class HazardousGoodsTransit
{
    /** @var string */
    #[SerializedName('cbc:TransportEmergencyCardCode')]
    public string $TransportEmergencyCardCode;

    /** @var string */
    #[SerializedName('cbc:PackingCriteriaCode')]
    public string $PackingCriteriaCode;

    /** @var string */
    #[SerializedName('cbc:HazardousRegulationCode')]
    public string $HazardousRegulationCode;

    /** @var string */
    #[SerializedName('cbc:InhalationToxicityZoneCode')]
    public string $InhalationToxicityZoneCode;

    /** @var string */
    #[SerializedName('cbc:TransportAuthorizationCode')]
    public string $TransportAuthorizationCode;

    /** @var MaximumTemperature */
    #[SerializedName('cac:MaximumTemperature')]
    public $MaximumTemperature;

    /** @var MinimumTemperature */
    #[SerializedName('cac:MinimumTemperature')]
    public $MinimumTemperature;
}
