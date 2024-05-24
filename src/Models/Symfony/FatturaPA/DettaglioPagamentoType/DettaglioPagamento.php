<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioPagamentoType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DettaglioPagamento
{
	#[Length(min: 1, max: 200)]
	#[Regex('/[\p{L}]{1,200}/u')]
	public string $Beneficiario;

	#[Choice([
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
	])]
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

	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataRiferimentoTerminiPagamento;
	public int $GiorniTerminiPagamento;

	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataScadenzaPagamento;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $ImportoPagamento;

	#[Length(min: 1, max: 20)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $CodUfficioPostale;

	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $CognomeQuietanzante;

	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $NomeQuietanzante;

	#[Length(min: 16, max: 16)]
	#[Regex('/[A-Z0-9]{16}/')]
	public string $CFQuietanzante;

	#[Length(min: 2, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}]{2,10}/u')]
	public string $TitoloQuietanzante;

	#[Length(min: 1, max: 80)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string $IstitutoFinanziario;

	#[Length(min: 11, max: 30)]
	#[Regex('/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{11,30}/')]
	public string $IBAN;

	#[Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $ABI;

	#[Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $CAB;

	#[Length(min: 0, max: 1)]
	#[Regex('/[A-Z]{6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3})?/')]
	public string $BIC;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $ScontoPagamentoAnticipato;

	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataLimitePagamentoAnticipato;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $PenalitaPagamentiRitardati;

	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataDecorrenzaPenale;

	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0020}-\x{007E}]{1,60}/u')]
	public string $CodicePagamento;
}
