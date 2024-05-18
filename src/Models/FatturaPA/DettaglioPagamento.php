<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DettaglioPagamento extends Data
{
	public ?string $Beneficiario;
	public ?string $ModalitaPagamento;

	private array $ModalitaPagamento_array = [
		'MP01' => 'contanti',
		'MP02' => 'assegno',
		'MP03' => 'assegno circolare',
		'MP04' => 'contanti presso Tesoreria',
		'MP05' => 'bonifico',
		'MP06' => 'vaglia cambiario',
		'MP07' => 'bollettino bancario',
		'MP08' => 'carta di pagamento',
		'MP09' => 'RID',
		'MP10' => 'RID utenze',
		'MP11' => 'RID veloce',
		'MP12' => 'RIBA',
		'MP13' => 'MAV',
		'MP14' => 'quietanza erario',
		'MP15' => 'giroconto su conti di contabilità speciale',
		'MP16' => 'domiciliazione bancaria',
		'MP17' => 'domiciliazione postale',
		'MP18' => 'bollettino di c/c postale',
		'MP19' => 'SEPA Direct Debit',
		'MP20' => 'SEPA Direct Debit CORE',
		'MP21' => 'SEPA Direct Debit B2B',
		'MP22' => 'Trattenuta su somme già riscosse',
		'MP23' => 'PagoPA',
	];

	public Carbon|Optional $DataRiferimentoTerminiPagamento;
	public ?int $GiorniTerminiPagamento;
	public Carbon|Optional $DataScadenzaPagamento;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $ImportoPagamento;
	public ?string $CodUfficioPostale;
	public ?string $CognomeQuietanzante;
	public ?string $NomeQuietanzante;
	public ?string $CFQuietanzante;
	public ?string $TitoloQuietanzante;
	public ?string $IstitutoFinanziario;
	public ?string $IBAN;
	public ?string $ABI;
	public ?string $CAB;
	public ?string $BIC;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $ScontoPagamentoAnticipato;
	public Carbon|Optional $DataLimitePagamentoAnticipato;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $PenalitaPagamentiRitardati;
	public Carbon|Optional $DataDecorrenzaPenale;
	public ?string $CodicePagamento;
}
