<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\CessionarioCommittenteType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiCessionarioType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\Sede;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\StabileOrganizzazione;
use Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleCessionarioType\RappresentanteFiscale;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CessionarioCommittente extends Data
{
	public DatiAnagrafici $DatiAnagrafici;
	public Sede $Sede;
	public StabileOrganizzazione|Optional $StabileOrganizzazione;
	public RappresentanteFiscale|Optional $RappresentanteFiscale;
}
