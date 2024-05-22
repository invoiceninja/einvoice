<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ContattiTrasmittenteType\ContattiTrasmittente;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType\IdTrasmittente;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiTrasmissione
{
	#[NotNull]
	public IdTrasmittente $IdTrasmittente;

	#[NotNull]
	#[Length(max: 10)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $ProgressivoInvio;
	private array $FormatoTrasmissione_array = ['FPA12', 'FPR12'];

	#[NotNull]
	public string $FormatoTrasmissione;

	#[NotNull]
	#[Length(max: 7)]
	#[Length(min: 6)]
	#[Regex('/[A-Z0-9]{6,7}/')]
	public string $CodiceDestinatario;
	public ContattiTrasmittente $ContattiTrasmittente;

	#[Length(max: 256)]
	#[Length(min: null)]
	#[Regex('/^(?!.*\.\.)(?!.*\.$)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/')]
	public string $PECDestinatario;
}
