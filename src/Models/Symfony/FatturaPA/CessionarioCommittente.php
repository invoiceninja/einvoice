<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiCessionarioType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\Sede;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\StabileOrganizzazione;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\RappresentanteFiscaleCessionarioType\RappresentanteFiscale;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class CessionarioCommittente
{
	#[NotNull]
	public DatiAnagrafici $DatiAnagrafici;

	#[NotNull]
	public Sede $Sede;
	public StabileOrganizzazione $StabileOrganizzazione;
	public RappresentanteFiscale $RappresentanteFiscale;
}
