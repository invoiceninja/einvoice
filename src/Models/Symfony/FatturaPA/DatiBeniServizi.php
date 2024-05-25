<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioLineeType\DettaglioLinee;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiBeniServiziacac
{
	/** @var DettaglioLinccee[] */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public array $DettaglioLinee = [];

	/** @var DatiRiepilogo[] */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public array $DatiRiepilogo = [];

	public function addDatiRiepilogo(DatiRiepilogo $DatiRiepilogo)
	{
		$this->DatiRiepilogo[] = $DatiRiepilogo;

		return $this;
	}

	public function hasDatiRiepilogo()
	{
		return count($this->DatiRiepilogo) > 0;
	}

	/**
	 * Get the value of DatiRiepilogo
	 */ 
	public function getDatiRiepilogo()
	{
		return $this->DatiRiepilogo;
	}

	/**
	 * Set the value of DatiRiepilogo
	 *
	 * @return  self
	 */ 
	public function setDatiRiepilogo($DatiRiepilogo)
	{
		$this->DatiRiepilogo = $DatiRiepilogo;

		return $this;
	}
}
