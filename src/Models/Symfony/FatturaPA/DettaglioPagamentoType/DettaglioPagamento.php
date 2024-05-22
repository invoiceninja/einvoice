<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioPagamentoType;

use Carbon\Carbon;

class DettaglioPagamento
{
	#[\Symfony\Component\Validator\Constraints\Length(max: 200)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\p{L}]{1,200}/u')]
	public string $Beneficiario;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	public string $ModalitaPagamento;

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

	public Carbon $DataRiferimentoTerminiPagamento;
	public int $GiorniTerminiPagamento;
	public Carbon $DataScadenzaPagamento;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImportoPagamento;

	#[\Symfony\Component\Validator\Constraints\Length(max: 20)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $CodUfficioPostale;

	#[\Symfony\Component\Validator\Constraints\Length(max: 60)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $CognomeQuietanzante;

	#[\Symfony\Component\Validator\Constraints\Length(max: 60)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $NomeQuietanzante;

	#[\Symfony\Component\Validator\Constraints\Length(max: 16)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 16)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[A-Z0-9]{16}/')]
	public string $CFQuietanzante;

	#[\Symfony\Component\Validator\Constraints\Length(max: 10)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 2)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{2,10}/u')]
	public string $TitoloQuietanzante;

	#[\Symfony\Component\Validator\Constraints\Length(max: 80)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string $IstitutoFinanziario;

	#[\Symfony\Component\Validator\Constraints\Length(max: 30)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 11)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{11,30}/')]
	public string $IBAN;

	#[\Symfony\Component\Validator\Constraints\Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $ABI;

	#[\Symfony\Component\Validator\Constraints\Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $CAB;

	#[\Symfony\Component\Validator\Constraints\Length(max: 1)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 0)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[A-Z]{6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3})?/')]
	public string $BIC;

	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ScontoPagamentoAnticipato;
	public Carbon $DataLimitePagamentoAnticipato;

	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $PenalitaPagamentiRitardati;
	public Carbon $DataDecorrenzaPenale;

	#[\Symfony\Component\Validator\Constraints\Length(max: 60)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,60}/u')]
	public string $CodicePagamento;
}
