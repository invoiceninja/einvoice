<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\ContattiType\Contatti;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiCedenteType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\Sede;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\StabileOrganizzazione;
use Invoiceninja\Einvoice\Models\FatturaPA\IscrizioneREAType\IscrizioneREA;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CedentePrestatore extends Data
{
	public DatiAnagrafici $DatiAnagrafici;
	public Sede $Sede;
	public StabileOrganizzazione|Optional $StabileOrganizzazione;
	public IscrizioneREA|Optional $IscrizioneREA;
	public Contatti|Optional $Contatti;
	public ?string $RiferimentoAmministrazione;
}
