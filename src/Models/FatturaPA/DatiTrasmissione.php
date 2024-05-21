<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\ContattiTrasmittenteType\ContattiTrasmittente;
use Invoiceninja\Einvoice\Models\FatturaPA\IdFiscaleType\IdTrasmittente;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiTrasmissione extends Data
{
	#[Required]
	public ?IdTrasmittente $IdTrasmittente;

	#[Required]
	public ?string $ProgressivoInvio;
	private array $FormatoTrasmissione_array = ['FPA12' => 'Fattura verso PA', 'FPR12' => 'Fattura verso privati'];

	#[Required]
	#[\Spatie\LaravelData\Attributes\Validation\In(FPA12: 'Fattura verso PA', FPR12: 'Fattura verso privati')]
	public ?string $FormatoTrasmissione;

	#[Required]
	public ?string $CodiceDestinatario;
	public ContattiTrasmittente|Optional $ContattiTrasmittente;
	public string|Optional $PECDestinatario;
}
