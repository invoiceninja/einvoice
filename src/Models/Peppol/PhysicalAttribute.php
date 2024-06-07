<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class PhysicalAttribute
{
    /** @var string */
    #[SerializedName('cbc:AttributeID')]
    public string $AttributeID;

    /** @var string */
    #[SerializedName('cbc:PositionCode')]
    public string $PositionCode;

    /** @var string */
    #[SerializedName('cbc:DescriptionCode')]
    public string $DescriptionCode;

    /** @var string */
    #[SerializedName('cbc:Description')]
    public string $Description;
}
