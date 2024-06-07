<?php

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiPagamentoType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioPagamentoType\DettaglioPagamento;
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

class DatiPagamento
{
    /** @var string */
    #[Length(min: 4, max: 4)]
    #[Choice(['TP01', 'TP02', 'TP03'])]
    public string $CondizioniPagamento;
    private array $CondizioniPagamento_array = ['TP01', 'TP02', 'TP03'];

    /** @var DettaglioPagamento[] */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    public array $DettaglioPagamento;
}
