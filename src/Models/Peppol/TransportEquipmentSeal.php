<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class TransportEquipmentSeal
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var string */
    #[SerializedName('cbc:SealIssuerTypeCode')]
    public string $SealIssuerTypeCode;

    /** @var string */
    #[SerializedName('cbc:Condition')]
    public string $Condition;

    /** @var string */
    #[SerializedName('cbc:SealStatusCode')]
    public string $SealStatusCode;

    /** @var string */
    #[SerializedName('cbc:SealingPartyType')]
    public string $SealingPartyType;
}
