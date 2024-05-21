<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioPagamentoType\DettaglioPagamento;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class DatiPagamento extends Data
{
	private array $CondizioniPagamento_array = ['TP01', 'TP02', 'TP03'];

	#[Required]
	#[\Spatie\LaravelData\Attributes\Validation\In(TP01: 'pagamento a rate', TP02: 'pagamento completo', TP03: 'anticipo')]
	public string $CondizioniPagamento;

	#[Required]
	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\DettaglioPagamentoType\DettaglioPagamento')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DettaglioPagamento;
}
