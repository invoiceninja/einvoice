<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBeniServiziType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioLineeType\DettaglioLinee;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiBeniServizi
{
	/** @param DettaglioLinee[] $DettaglioLinee */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public DettaglioLinee $DettaglioLinee;

	/** @param DatiRiepilogo[] $DatiRiepilogo */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public DatiRiepilogo $DatiRiepilogo;
}
