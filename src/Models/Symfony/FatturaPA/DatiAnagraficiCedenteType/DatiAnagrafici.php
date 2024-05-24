<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiCedenteType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiAnagrafici
{
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public IdFiscaleIVA $IdFiscaleIVA;

	#[Length(min: 11, max: 16)]
	#[Regex('/[A-Z0-9]{11,16}/')]
	public string $CodiceFiscale;

	#[NotNull]
	#[NotBlank]
	#[Valid]
	public Anagrafica $Anagrafica;

	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $AlboProfessionale;

	#[Length(min: 2, max: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $ProvinciaAlbo;

	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0020}-\x{007E}]{1,60}/u')]
	public string $NumeroIscrizioneAlbo;

	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataIscrizioneAlbo;

	#[Choice([
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
	])]
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
