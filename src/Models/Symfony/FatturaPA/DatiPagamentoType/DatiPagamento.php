<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiPagamentoType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioPagamentoType\DettaglioPagamento;

class DatiPagamento
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Length(max: 4)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 4)]
	public string $CondizioniPagamento;
	private array $CondizioniPagamento_array = ['TP01', 'TP02', 'TP03'];

	/**
	 * @var DettaglioPagamento[] $DettaglioPagamento
	 * @var DettaglioPagamento[] $DettaglioPagamento
	 */
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public DettaglioPagamento $DettaglioPagamento;
}
