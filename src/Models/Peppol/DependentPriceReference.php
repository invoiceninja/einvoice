<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Peppol\AddressType\LocationAddress;
use Invoiceninja\Einvoice\Models\Peppol\LineReferenceType\DependentLineReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class DependentPriceReference
{
    /** @var string */
    #[SerializedName('cbc:Percent')]
    public string $Percent;

    /** @var LocationAddress */
    #[SerializedName('cac:LocationAddress')]
    public $LocationAddress;

    /** @var DependentLineReference */
    #[SerializedName('cac:DependentLineReference')]
    public $DependentLineReference;
}
