<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiPagamentoType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioPagamentoType\DettaglioPagamento;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class DatiPagamento extends Data
{
	#[Required]
	#[Max(4)]
	#[Min(4)]
	public string $CondizioniPagamento;

	private array $CondizioniPagamento_array = [
		'TP01' => 'pagamento a rate',
		'TP02' => 'pagamento completo',
		'TP03' => 'anticipo',
	];

	#[Required]
	#[DataCollectionOf('DettaglioPagamento')]
	public DataCollection $DettaglioPagamento;
}
