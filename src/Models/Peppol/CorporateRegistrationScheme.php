<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Peppol\AddressType\JurisdictionRegionAddress;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class CorporateRegistrationScheme
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var string */
    #[SerializedName('cbc:Name')]
    public string $Name;

    /** @var string */
    #[SerializedName('cbc:CorporateRegistrationTypeCode')]
    public string $CorporateRegistrationTypeCode;

    /** @var JurisdictionRegionAddress[] */
    #[SerializedName('cac:JurisdictionRegionAddress')]
    public array $JurisdictionRegionAddress;
}
