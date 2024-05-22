<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DettaglioPagamento
{
	#[Length(max: 200)]
	#[Length(min: 1)]
	#[Regex('/[\p{L}]{1,200}/u')]
	public string $Beneficiario;

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

	#[NotNull]
	#[NotBlank]
	public string $ModalitaPagamento;

	#[Date('Y-m-d')]
	public Carbon $DataRiferimentoTerminiPagamento;
	public int $GiorniTerminiPagamento;

	#[Date('Y-m-d')]
	public Carbon $DataScadenzaPagamento;

	#[NotNull]
	#[NotBlank]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImportoPagamento;

	#[Length(max: 20)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $CodUfficioPostale;

	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $CognomeQuietanzante;

	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $NomeQuietanzante;

	#[Length(max: 16)]
	#[Length(min: 16)]
	#[Regex('/[A-Z0-9]{16}/')]
	public string $CFQuietanzante;

	#[Length(max: 10)]
	#[Length(min: 2)]
	#[Regex('/[\x{0020}-\x{007E}]{2,10}/u')]
	public string $TitoloQuietanzante;

	#[Length(max: 80)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string $IstitutoFinanziario;

	#[Length(max: 30)]
	#[Length(min: 11)]
	#[Regex('/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{11,30}/')]
	public string $IBAN;

	#[Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $ABI;

	#[Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $CAB;

	#[Length(max: 1)]
	#[Length(min: 0)]
	#[Regex('/[A-Z]{6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3})?/')]
	public string $BIC;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ScontoPagamentoAnticipato;

	#[Date('Y-m-d')]
	public Carbon $DataLimitePagamentoAnticipato;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $PenalitaPagamentiRitardati;

	#[Date('Y-m-d')]
	public Carbon $DataDecorrenzaPenale;

	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,60}/u')]
	public string $CodicePagamento;
}
