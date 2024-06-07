<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA;

use InvoiceNinja\EInvoice\Models\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use InvoiceNinja\EInvoice\Models\FatturaPA\DettaglioLineeType\DettaglioLinee;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiBeniServizi
{
	/** @var DettaglioLinee[] */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public array $DettaglioLinee;

	/** @var DatiRiepilogo[] */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public array $DatiRiepilogo;
}
