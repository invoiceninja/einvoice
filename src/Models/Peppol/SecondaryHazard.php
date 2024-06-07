<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class SecondaryHazard
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var string */
    #[SerializedName('cbc:PlacardNotation')]
    public string $PlacardNotation;

    /** @var string */
    #[SerializedName('cbc:PlacardEndorsement')]
    public string $PlacardEndorsement;

    /** @var string */
    #[SerializedName('cbc:EmergencyProceduresCode')]
    public string $EmergencyProceduresCode;

    /** @var string */
    #[SerializedName('cbc:Extension')]
    public string $Extension;
}
