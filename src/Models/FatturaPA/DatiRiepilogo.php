<?php

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class DatiRiepilogo
{
    /** @var string */
    #[DecimalPrecision(2)]
    #[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
    public string $AliquotaIVA;

    private array $Natura_array = [
        'N1',
        'N2',
        'N2.1',
        'N2.2',
        'N3',
        'N3.1',
        'N3.2',
        'N3.3',
        'N3.4',
        'N3.5',
        'N3.6',
        'N4',
        'N5',
        'N6',
        'N6.1',
        'N6.2',
        'N6.3',
        'N6.4',
        'N6.5',
        'N6.6',
        'N6.7',
        'N6.8',
        'N6.9',
        'N7',
    ];

    /** @var string */
    #[Choice([
        'N1',
        'N2',
        'N2.1',
        'N2.2',
        'N3',
        'N3.1',
        'N3.2',
        'N3.3',
        'N3.4',
        'N3.5',
        'N3.6',
        'N4',
        'N5',
        'N6',
        'N6.1',
        'N6.2',
        'N6.3',
        'N6.4',
        'N6.5',
        'N6.6',
        'N6.7',
        'N6.8',
        'N6.9',
        'N7',
    ])]
    public string $Natura;

    /** @var string */
    #[DecimalPrecision(2)]
    #[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
    public string $SpeseAccessorie;

    /** @var string */
    #[DecimalPrecision(2)]
    #[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
    public string $Arrotondamento;

    /** @var string */
    #[DecimalPrecision(2)]
    #[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
    public string $ImponibileImporto;

    /** @var string */
    #[DecimalPrecision(2)]
    #[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
    public string $Imposta;
    private array $EsigibilitaIVA_array = ['D', 'I', 'S'];

    /** @var string */
    #[Length(min: 1, max: 1)]
    #[Choice(['D', 'I', 'S'])]
    public string $EsigibilitaIVA;

    /** @var string */
    #[Length(min: 1, max: 100)]
    #[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,100}/u')]
    public string $RiferimentoNormativo;
}
