<?php

namespace Invoiceninja\Einvoice\Models\FatturaPA\CessionarioCommittenteType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiCessionarioType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\Sede;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\StabileOrganizzazione;
use Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleCessionarioType\RappresentanteFiscale;
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

class CessionarioCommittente
{
    /** @var DatiAnagrafici */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    public $DatiAnagrafici;

    /** @var Sede */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    public $Sede;

    /** @var StabileOrganizzazione */
    public $StabileOrganizzazione;

    /** @var RappresentanteFiscale */
    public $RappresentanteFiscale;
}
