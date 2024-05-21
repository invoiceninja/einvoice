<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiTrasmissioneType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\ContattiTrasmittenteType\ContattiTrasmittente;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdTrasmittente;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiTrasmissione extends Data
{
	#[Required]
	public IdTrasmittente $IdTrasmittente;

	#[Required]
	#[Max(10)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $ProgressivoInvio;

	#[Required]
	public string $FormatoTrasmissione;
	private array $FormatoTrasmissione_array = ['FPA12', 'FPR12'];

	#[Required]
	#[Max(7)]
	#[Min(6)]
	#[Regex('/[A-Z0-9]{6,7}/')]
	public string $CodiceDestinatario;
	public ContattiTrasmittente|Optional $ContattiTrasmittente;

	#[Max(256)]
	#[Regex('/^(?!.*\.\.)(?!.*\.$)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/')]
	public string|Optional $PECDestinatario;
}
