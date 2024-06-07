<?php

namespace Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleCessionarioType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
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

class RappresentanteFiscale
{
    /** @var string */
    #[Length(min: 1, max: 80)]
    #[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,80}/u')]
    public string $Denominazione;

    /** @var string */
    #[Length(min: 1, max: 60)]
    #[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,60}/u')]
    public string $Nome;

    /** @var string */
    #[Length(min: 1, max: 60)]
    #[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,60}/u')]
    public string $Cognome;

    /** @var IdFiscaleIVA */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    public $IdFiscaleIVA;
}
