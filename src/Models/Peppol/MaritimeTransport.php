<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\RegistryCertificateDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\LocationType\RegistryPortLocation;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class MaritimeTransport
{
    /** @var string */
    #[SerializedName('cbc:VesselID')]
    public string $VesselID;

    /** @var string */
    #[SerializedName('cbc:VesselName')]
    public string $VesselName;

    /** @var string */
    #[SerializedName('cbc:RadioCallSignID')]
    public string $RadioCallSignID;

    /** @var string */
    #[SerializedName('cbc:ShipsRequirements')]
    public string $ShipsRequirements;

    /** @var string */
    #[DecimalPrecision(2)]
    #[SerializedName('cbc:GrossTonnageMeasure')]
    public string $GrossTonnageMeasure;

    /** @var string */
    #[DecimalPrecision(2)]
    #[SerializedName('cbc:NetTonnageMeasure')]
    public string $NetTonnageMeasure;

    /** @var RegistryCertificateDocumentReference */
    #[SerializedName('cac:RegistryCertificateDocumentReference')]
    public $RegistryCertificateDocumentReference;

    /** @var RegistryPortLocation */
    #[SerializedName('cac:RegistryPortLocation')]
    public $RegistryPortLocation;
}
