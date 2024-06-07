<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA\DatiAnagraficiRappresentanteType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\FatturaPA\AnagraficaType\Anagrafica;
use InvoiceNinja\EInvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
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

class DatiAnagrafici
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
}
