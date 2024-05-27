<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Invoiceninja\Einvoice\Models\FatturaPA\AllegatiType\Allegati;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiBeniServiziType\DatiBeniServizi;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiGeneraliType\DatiGenerali;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiPagamentoType\DatiPagamento;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiVeicoliType\DatiVeicoli;
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
	public array $DatiPagamento = [];

	/** @var Allegati[] */
	public array $Allegati = [];
}
