<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiPagamentoType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioPagamentoType\DettaglioPagamento;
use Invoiceninja\Einvoice\Writer\Symfony\All;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiPagamento
{
	#[Length(min: 4, max: 4)]
	#[Choice(['TP01', 'TP02', 'TP03'])]
	public string $CondizioniPagamento;
	private array $CondizioniPagamento_array = ['TP01', 'TP02', 'TP03'];

	/** @param DettaglioPagamento[] $DettaglioPagamento */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public DettaglioPagamento $DettaglioPagamento;
}
