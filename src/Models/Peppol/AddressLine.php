<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class AddressLine
{
    /** @var string */
    #[SerializedName('cbc:Line')]
    public string $Line;
}
