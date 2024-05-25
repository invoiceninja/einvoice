<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBeniServiziType;

use DateTime;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioLineeType\DettaglioLinee;
use Symfony\Component\Serializer\Attribute\SerializedName;

class DatiBeniServizi
{
	/*
	* @var DettaglioLinee[]
	*/
	#[All([
	 new NotNull(),
	 new NotBlank(),
	 new Type(DettaglioLinee::class)
	])]
	public $DettaglioLinee = [];

	/*
	* @var DatiRiepilogo $DatiRiepilogo
	*/
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public DatiRiepilogo $DatiRiepilogo;

	public function getDatiRiepilogo()
	{
		return $this->DatiRiepilogo;
	}

	public function setDatiRiepilogo($DatiRiepilogo)
	{
		$this->DatiRiepilogo = $DatiRiepilogo;
		return $this;
	}

	public function addDatiRiepilogo($DatiRiepilogo)
	{
		$this->DatiRiepilogo = $DatiRiepilogo;
		return $this;
	}
	public function getDettaglioLinee()
	{ 
		return $this->DettaglioLinee;
	}

	public function setDetagglioLinee($DettaglioLinee)
	{
		$this->DettaglioLinee = $DettaglioLinee;

		return $this;
	}

	public function addDettaglioLinee($DettaglioLinee): void
	{
		$this->DettaglioLinee[] = $DettaglioLinee;
	}

	public function hasDettaglioLinee(): bool
	{
		return count($this->DettaglioLinee) > 0;
	}

	 public function removeDettaglioLinee( $DettaglioLinee): void
    {
    }
}
