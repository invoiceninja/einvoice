<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\RappresentanteFiscaleType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiRappresentanteType\DatiAnagrafici;
use Symfony\Component\Serializer\Attribute\Context;
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
	/** @var DatiAnagrafici */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $DatiAnagrafici;
}
