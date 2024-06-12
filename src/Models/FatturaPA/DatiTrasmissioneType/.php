<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA\DatiTrasmissioneType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\FatturaPA\ContattiTrasmittenteType\ContattiTrasmittente;
use InvoiceNinja\EInvoice\Models\FatturaPA\IdFiscaleType\IdTrasmittente;
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

class DatiTrasmissione
{
	/** @var IdTrasmittente */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $IdTrasmittente;

	/** @var string */
	#[Length(min: 1, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,10}/u')]
	public string $ProgressivoInvio;

	/** @var string */
	#[Choice(['FPA12', 'FPR12'])]
	public string $FormatoTrasmissione;
	private array $FormatoTrasmissione_array = ['FPA12', 'FPR12'];

	/** @var string */
	#[Length(min: 6, max: 7)]
	#[Regex('/[A-Z0-9]{6,7}/')]
	public string $CodiceDestinatario;

	/** @var ContattiTrasmittente */
	public $ContattiTrasmittente;

	/** @var string */
	#[Length(min: null, max: 256)]
	#[Regex('/^(?!.*\.\.)(?!.*\.$)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/')]
	public string $PECDestinatario;
}
