<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiTrasmissioneType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ContattiTrasmittenteType\ContattiTrasmittente;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType\IdTrasmittente;

class DatiTrasmissione
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public IdTrasmittente $IdTrasmittente;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Length(max: 10)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $ProgressivoInvio;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	public string $FormatoTrasmissione;
	private array $FormatoTrasmissione_array = ['FPA12', 'FPR12'];

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Length(max: 7)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 6)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[A-Z0-9]{6,7}/')]
	public string $CodiceDestinatario;
	public ContattiTrasmittente $ContattiTrasmittente;

	#[\Symfony\Component\Validator\Constraints\Length(max: 256)]
	#[\Symfony\Component\Validator\Constraints\Length(min: null)]
	#[\Symfony\Component\Validator\Constraints\Regex('/^(?!.*\.\.)(?!.*\.$)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/')]
	public string $PECDestinatario;
}
