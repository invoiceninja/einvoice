<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DettaglioPagamento extends Data
{
	public string|Optional $Beneficiario;

	private array $ModalitaPagamento_array = [
		'MP01',
		'MP02',
		'MP03',
		'MP04',
		'MP05',
		'MP06',
		'MP07',
		'MP08',
		'MP09',
		'MP10',
		'MP11',
		'MP12',
		'MP13',
		'MP14',
		'MP15',
		'MP16',
		'MP17',
		'MP18',
		'MP19',
		'MP20',
		'MP21',
		'MP22',
		'MP23',
	];

	#[Required]
	#[\Spatie\LaravelData\Attributes\Validation\In(
		MP01: 'contanti',
		MP02: 'assegno',
		MP03: 'assegno circolare',
		MP04: 'contanti presso Tesoreria',
		MP05: 'bonifico',
		MP06: 'vaglia cambiario',
		MP07: 'bollettino bancario',
		MP08: 'carta di pagamento',
		MP09: 'RID',
		MP10: 'RID utenze',
		MP11: 'RID veloce',
		MP12: 'RIBA',
		MP13: 'MAV',
		MP14: 'quietanza erario',
		MP15: 'giroconto su conti di contabilità speciale',
		MP16: 'domiciliazione bancaria',
		MP17: 'domiciliazione postale',
		MP18: 'bollettino di c/c postale',
		MP19: 'SEPA Direct Debit',
		MP20: 'SEPA Direct Debit CORE',
		MP21: 'SEPA Direct Debit B2B',
		MP22: 'Trattenuta su somme già riscosse',
		MP23: 'PagoPA',
	)]
	public string $ModalitaPagamento;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataRiferimentoTerminiPagamento;
	public int|Optional $GiorniTerminiPagamento;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataScadenzaPagamento;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $ImportoPagamento;
	public string|Optional $CodUfficioPostale;
	public string|Optional $CognomeQuietanzante;
	public string|Optional $NomeQuietanzante;
	public string|Optional $CFQuietanzante;
	public string|Optional $TitoloQuietanzante;
	public string|Optional $IstitutoFinanziario;
	public string|Optional $IBAN;
	public string|Optional $ABI;
	public string|Optional $CAB;
	public string|Optional $BIC;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ScontoPagamentoAnticipato;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataLimitePagamentoAnticipato;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PenalitaPagamentiRitardati;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataDecorrenzaPenale;
	public string|Optional $CodicePagamento;
}
