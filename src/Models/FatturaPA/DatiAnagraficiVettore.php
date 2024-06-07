<?php

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Invoiceninja\Einvoice\Models\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiAnagraficiVettore
{
    /** @var IdFiscaleIVA */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    public $IdFiscaleIVA;

    /** @var string */
    #[Length(min: 11, max: 16)]
    #[Regex('/[A-Z0-9]{11,16}/')]
    public string $CodiceFiscale;

    /** @var Anagrafica */
    #[NotNull]
    #[NotBlank]
    #[Valid]
    public $Anagrafica;

    /** @var string */
    #[Length(min: 1, max: 20)]
    #[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,20}/u')]
    public string $NumeroLicenzaGuida;
}
