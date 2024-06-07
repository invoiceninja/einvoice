<?php

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Invoiceninja\Einvoice\Models\FatturaPA\CedentePrestatoreType\CedentePrestatore;
use Invoiceninja\Einvoice\Models\FatturaPA\CessionarioCommittenteType\CessionarioCommittente;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiTrasmissioneType\DatiTrasmissione;
use Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleType\RappresentanteFiscale;
use Invoiceninja\Einvoice\Models\FatturaPA\TerzoIntermediarioSoggettoEmittenteType\TerzoIntermediarioOSoggettoEmittente;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class FatturaElettronicaHeader
{
    /** @var DatiTrasmissione */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    public $DatiTrasmissione;

    /** @var CedentePrestatore */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    public $CedentePrestatore;

    /** @var RappresentanteFiscale */
    public $RappresentanteFiscale;

    /** @var CessionarioCommittente */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    public $CessionarioCommittente;

    /** @var TerzoIntermediarioOSoggettoEmittente */
    public $TerzoIntermediarioOSoggettoEmittente;
    private array $SoggettoEmittente_array = ['CC', 'TZ'];

    /** @var string */
    #[Choice(['CC', 'TZ'])]
    public string $SoggettoEmittente;
}
