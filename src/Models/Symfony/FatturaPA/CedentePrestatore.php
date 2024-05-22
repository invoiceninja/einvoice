<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ContattiType\Contatti;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiCedenteType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\Sede;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\StabileOrganizzazione;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IscrizioneREAType\IscrizioneREA;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class CedentePrestatore
{
	#[NotNull]
	#[NotBlank]
	public DatiAnagrafici $DatiAnagrafici;

	#[NotNull]
	#[NotBlank]
	public Sede $Sede;
	public StabileOrganizzazione $StabileOrganizzazione;
	public IscrizioneREA $IscrizioneREA;
	public Contatti $Contatti;

	#[Length(max: 20)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $RiferimentoAmministrazione;
}
