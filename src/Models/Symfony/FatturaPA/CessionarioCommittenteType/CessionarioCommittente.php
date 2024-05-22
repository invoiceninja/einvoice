<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CessionarioCommittenteType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiCessionarioType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\Sede;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\StabileOrganizzazione;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\RappresentanteFiscaleCessionarioType\RappresentanteFiscale;

class CessionarioCommittente
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public DatiAnagrafici $DatiAnagrafici;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	public Sede $Sede;
	public StabileOrganizzazione $StabileOrganizzazione;
	public RappresentanteFiscale $RappresentanteFiscale;
}
