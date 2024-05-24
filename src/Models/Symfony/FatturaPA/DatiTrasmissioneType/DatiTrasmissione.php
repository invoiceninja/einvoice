<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiTrasmissioneType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ContattiTrasmittenteType\ContattiTrasmittente;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType\IdTrasmittente;
use Invoiceninja\Einvoice\Writer\Symfony\All;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiTrasmissione
{
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public IdTrasmittente $IdTrasmittente;

	#[Length(min: 1, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $ProgressivoInvio;

	#[Choice(['FPA12', 'FPR12'])]
	public string $FormatoTrasmissione;
	private array $FormatoTrasmissione_array = ['FPA12', 'FPR12'];

	#[Length(min: 6, max: 7)]
	#[Regex('/[A-Z0-9]{6,7}/')]
	public string $CodiceDestinatario;
	public ContattiTrasmittente $ContattiTrasmittente;

	#[Length(min: null, max: 256)]
	#[Regex('/^(?!.*\.\.)(?!.*\.$)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/')]
	public string $PECDestinatario;
}
