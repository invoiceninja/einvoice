<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiTrasmissioneType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\ContattiTrasmittenteType\ContattiTrasmittente;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdTrasmittente;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiTrasmissione extends Data
{
	public IdTrasmittente $IdTrasmittente;

	#[Max(10)]
	#[Min(1)]
	#[Regex('/(\p{Latin}{1,10})/u')]
	public string $ProgressivoInvio;
	public string $FormatoTrasmissione;
	public array $FormatoTrasmissione_array = ['FPA12' => 'Fattura verso PA', 'FPR12' => 'Fattura verso privati'];

	#[Max(7)]
	#[Min(6)]
	#[Regex('/[A-Z0-9]{6,7}/')]
	public string $CodiceDestinatario;
	public ContattiTrasmittente|Optional $ContattiTrasmittente;

	#[Max(256)]
	#[Regex('([!#-\'*+/-9=?A-Z^-~-]+(\.[!#-\'*+/-9=?A-Z^-~-]+)*|"(\[\]!#-[^-~ \t]|(\\\[\t -~]))+")@([!#-\'*+/-9=?A-Z^-~-]+(\.[!#-\'*+/-9=?A-Z^-~-]+)*|\[[\t -Z^-~]*\])')]
	public string|Optional $PECDestinatario;
}
