<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiCedenteType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType\IdFiscaleIVA;

class DatiAnagrafici
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public IdFiscaleIVA $IdFiscaleIVA;

	#[\Symfony\Component\Validator\Constraints\Length(max: 16)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 11)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[A-Z0-9]{11,16}/')]
	public string $CodiceFiscale;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	public Anagrafica $Anagrafica;

	#[\Symfony\Component\Validator\Constraints\Length(max: 60)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $AlboProfessionale;

	#[\Symfony\Component\Validator\Constraints\Length(max: 2)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 2)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[A-Z]{2}/')]
	public string $ProvinciaAlbo;

	#[\Symfony\Component\Validator\Constraints\Length(max: 60)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,60}/u')]
	public string $NumeroIscrizioneAlbo;
	public Carbon $DataIscrizioneAlbo;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	public string $RegimeFiscale;

	private array $RegimeFiscale_array = [
		'RF01',
		'RF02',
		'RF04',
		'RF05',
		'RF06',
		'RF07',
		'RF08',
		'RF09',
		'RF10',
		'RF11',
		'RF12',
		'RF13',
		'RF14',
		'RF15',
		'RF16',
		'RF17',
		'RF19',
		'RF18',
	];
}
