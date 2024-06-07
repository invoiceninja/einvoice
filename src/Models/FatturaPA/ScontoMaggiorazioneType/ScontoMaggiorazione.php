<?php

namespace Invoiceninja\Einvoice\Models\FatturaPA\ScontoMaggiorazioneType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class ScontoMaggiorazione
{
    /** @var string */
    #[Choice(['SC', 'MG'])]
    public string $Tipo;
    private array $Tipo_array = ['SC', 'MG'];

    /** @var string */
    #[DecimalPrecision(2)]
    #[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
    public string $Percentuale;

    /** @var string */
    #[DecimalPrecision(2)]
    #[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
    public string $Importo;
}
