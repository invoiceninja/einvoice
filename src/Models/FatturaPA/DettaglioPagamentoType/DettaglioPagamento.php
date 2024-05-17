<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DettaglioPagamentoType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DettaglioPagamento extends Data
{
	#[Max(200)]
	#[Min(1)]
	#[Regex('/[\p{L}]{1,200}/u')]
	public string|Optional $Beneficiario;
	public string $ModalitaPagamento;

	public array $ModalitaPagamento_array = [
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

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataRiferimentoTerminiPagamento;
	public int|Optional $GiorniTerminiPagamento;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataScadenzaPagamento;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImportoPagamento;

	#[Max(20)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string|Optional $CodUfficioPostale;

	#[Max(60)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string|Optional $CognomeQuietanzante;

	#[Max(60)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string|Optional $NomeQuietanzante;

	#[Max(16)]
	#[Min(16)]
	#[Regex('/[A-Z0-9]{16}/')]
	public string|Optional $CFQuietanzante;

	#[Max(10)]
	#[Min(2)]
	#[Regex('/[\x{0020}-\x{007E}]{2,10}/u')]
	public string|Optional $TitoloQuietanzante;

	#[Max(80)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string|Optional $IstitutoFinanziario;

	#[Max(30)]
	#[Min(11)]
	#[Regex('/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{11,30}/')]
	public string|Optional $IBAN;

	#[Regex('[0-9][0-9][0-9][0-9][0-9]')]
	public string|Optional $ABI;

	#[Regex('[0-9][0-9][0-9][0-9][0-9]')]
	public string|Optional $CAB;

	#[Max(1)]
	#[Min(0)]
	#[Regex('/[A-Z]{6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3})?/')]
	public string|Optional $BIC;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|Optional $ScontoPagamentoAnticipato;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataLimitePagamentoAnticipato;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|Optional $PenalitaPagamentiRitardati;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataDecorrenzaPenale;

	#[Max(60)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,60}/u')]
	public string|Optional $CodicePagamento;
}
