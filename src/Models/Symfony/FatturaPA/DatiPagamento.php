<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioPagamentoType\DettaglioPagamento;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiPagamento
{
	private array $CondizioniPagamento_array = ['TP01', 'TP02', 'TP03'];

	#[NotNull]
	#[NotBlank]
	#[Length(max: 4)]
	#[Length(min: 4)]
	public string $CondizioniPagamento;

	/** @var DettaglioPagamento[] $DettaglioPagamento */
	#[NotNull]
	#[NotBlank]
	public DettaglioPagamento $DettaglioPagamento;
}
