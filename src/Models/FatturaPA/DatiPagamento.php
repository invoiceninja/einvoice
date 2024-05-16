<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioPagamentoType\DettaglioPagamento;
use Spatie\LaravelData\Data;

class DatiPagamento extends Data
{
	public string $CondizioniPagamento;

	public array $CondizioniPagamento_array = [
		'TP01' => 'pagamento a rate',
		'TP02' => 'pagamento completo',
		'TP03' => 'anticipo',
	];

	public DettaglioPagamento $DettaglioPagamento;
}
