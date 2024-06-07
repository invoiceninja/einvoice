<?php

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioPagamentoType\DettaglioPagamento;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiPagamento
{
    private array $CondizioniPagamento_array = ['TP01', 'TP02', 'TP03'];

    /** @var string */
    #[Length(min: 4, max: 4)]
    #[Choice(['TP01', 'TP02', 'TP03'])]
    public string $CondizioniPagamento;

    /** @var DettaglioPagamento[] */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    public array $DettaglioPagamento;
}
