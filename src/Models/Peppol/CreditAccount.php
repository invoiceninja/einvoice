<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class CreditAccount
{
    /** @var string */
    #[SerializedName('cbc:AccountID')]
    public string $AccountID;
}
