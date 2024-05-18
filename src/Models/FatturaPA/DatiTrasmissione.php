<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\ContattiTrasmittenteType\ContattiTrasmittente;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdTrasmittente;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiTrasmissione extends Data
{
	public IdTrasmittente $IdTrasmittente;
	public ?string $ProgressivoInvio;
	public ?string $FormatoTrasmissione;
	public array $FormatoTrasmissione_array = ['FPA12' => 'Fattura verso PA', 'FPR12' => 'Fattura verso privati'];
	public ?string $CodiceDestinatario;
	public ContattiTrasmittente|Optional $ContattiTrasmittente;
	public ?string $PECDestinatario;
}
