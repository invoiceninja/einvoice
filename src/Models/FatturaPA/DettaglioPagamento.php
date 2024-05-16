<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DettaglioPagamento extends Data
{
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

	public Carbon|Optional $DataRiferimentoTerminiPagamento;
	public int|Optional $GiorniTerminiPagamento;
	public Carbon|Optional $DataScadenzaPagamento;
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
	public float|Optional $ScontoPagamentoAnticipato;
	public Carbon|Optional $DataLimitePagamentoAnticipato;
	public float|Optional $PenalitaPagamentiRitardati;
	public Carbon|Optional $DataDecorrenzaPenale;
	public string|Optional $CodicePagamento;
}
