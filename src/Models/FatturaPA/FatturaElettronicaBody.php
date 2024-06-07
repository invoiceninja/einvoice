<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA;

use InvoiceNinja\EInvoice\Models\FatturaPA\AllegatiType\Allegati;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiBeniServiziType\DatiBeniServizi;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiGeneraliType\DatiGenerali;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiPagamentoType\DatiPagamento;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiVeicoliType\DatiVeicoli;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class FatturaElettronicaBody
{
	/** @var DatiGenerali */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $DatiGenerali;

	/** @var DatiBeniServizi */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $DatiBeniServizi;

	/** @var DatiVeicoli */
	public $DatiVeicoli;

	/** @var DatiPagamento[] */
	public array $DatiPagamento;

	/** @var Allegati[] */
	public array $Allegati;
}
