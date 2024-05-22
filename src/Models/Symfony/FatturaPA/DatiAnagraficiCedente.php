<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiAnagraficiCedente
{
	#[NotNull]
	#[NotBlank]
	public IdFiscaleIVA $IdFiscaleIVA;

	#[Length(max: 16)]
	#[Length(min: 11)]
	#[Regex('/[A-Z0-9]{11,16}/')]
	public string $CodiceFiscale;

	#[NotNull]
	#[NotBlank]
	public Anagrafica $Anagrafica;

	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $AlboProfessionale;

	#[Length(max: 2)]
	#[Length(min: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $ProvinciaAlbo;

	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,60}/u')]
	public string $NumeroIscrizioneAlbo;

	#[Date('Y-m-d')]
	public Carbon $DataIscrizioneAlbo;

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

	#[NotNull]
	#[NotBlank]
	public string $RegimeFiscale;
}
