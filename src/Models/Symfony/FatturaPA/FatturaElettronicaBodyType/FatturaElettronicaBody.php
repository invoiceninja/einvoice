<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaBodyType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AllegatiType\Allegati;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBeniServiziType\DatiBeniServizi;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiGeneraliType\DatiGenerali;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiPagamentoType\DatiPagamento;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiVeicoliType\DatiVeicoli;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class FatturaElettronicaBody
{
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public DatiGenerali $DatiGenerali;

	#[NotNull]
	#[NotBlank]
	#[Valid]
	public DatiBeniServizi $DatiBeniServizi;
	public DatiVeicoli $DatiVeicoli;

	/** @param DatiPagamento[] $DatiPagamento */
	public DatiPagamento $DatiPagamento;

	/** @param Allegati[] $Allegati */
	public Allegati $Allegati;
}
