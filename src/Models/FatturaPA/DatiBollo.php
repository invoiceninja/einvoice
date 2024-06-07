<?php

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Regex;

class DatiBollo
{
    private array $BolloVirtuale_array = ['SI'];

    /** @var string */
    public string $BolloVirtuale;

    /** @var string */
    #[DecimalPrecision(2)]
    #[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
    public string $ImportoBollo;
}
