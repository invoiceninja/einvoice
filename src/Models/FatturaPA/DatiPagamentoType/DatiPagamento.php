<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiPagamentoType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DettaglioPagamentoType\DettaglioPagamento;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class DatiPagamento extends Data
{
	#[Required]
	#[Max(4)]
	#[Min(4)]
	public string $CondizioniPagamento;
	private array $CondizioniPagamento_array = ['TP01', 'TP02', 'TP03'];

	#[Required]
	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\DettaglioPagamentoType\DettaglioPagamento')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DettaglioPagamento;
}
