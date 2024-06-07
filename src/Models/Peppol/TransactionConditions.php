<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class TransactionConditions
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var string */
    #[SerializedName('cbc:ActionCode')]
    public string $ActionCode;

    /** @var string */
    #[SerializedName('cbc:Description')]
    public string $Description;

    /** @var DocumentReference[] */
    #[SerializedName('cac:DocumentReference')]
    public array $DocumentReference;
}
