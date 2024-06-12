<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA\DettaglioPagamentoType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
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
	/** @var string */
	#[Length(min: 1, max: 200)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,200}/u')]
	public string $Beneficiario;

	/** @var string */
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

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataRiferimentoTerminiPagamento;

	/** @var integer */
	public int $GiorniTerminiPagamento;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataScadenzaPagamento;

	/** @var string */
	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public string $ImportoPagamento;

	/** @var string */
	#[Length(min: 1, max: 20)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,20}/u')]
	public string $CodUfficioPostale;

	/** @var string */
	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,60}/u')]
	public string $CognomeQuietanzante;

	/** @var string */
	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,60}/u')]
	public string $NomeQuietanzante;

	/** @var string */
	#[Length(min: 16, max: 16)]
	#[Regex('/[A-Z0-9]{16}/')]
	public string $CFQuietanzante;

	/** @var string */
	#[Length(min: 2, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{2,10}/u')]
	public string $TitoloQuietanzante;

	/** @var string */
	#[Length(min: 1, max: 80)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,80}/u')]
	public string $IstitutoFinanziario;

	/** @var string */
	#[Length(min: 11, max: 30)]
	#[Regex('/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{11,30}/')]
	public string $IBAN;

	/** @var string */
	#[Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $ABI;

	/** @var string */
	#[Regex('/[0-9][0-9][0-9][0-9][0-9]/')]
	public string $CAB;

	/** @var string */
	#[Length(min: 0, max: 1)]
	#[Regex('/[A-Z]{6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3})?/')]
	public string $BIC;

	/** @var string */
	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public string $ScontoPagamentoAnticipato;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataLimitePagamentoAnticipato;

	/** @var string */
	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public string $PenalitaPagamentiRitardati;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataDecorrenzaPenale;

	/** @var string */
	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,60}/u')]
	public string $CodicePagamento;
}
