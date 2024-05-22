<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class IscrizioneREA
{
	#[NotNull]
	#[NotBlank]
	#[Length(max: 2)]
	#[Length(min: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $Ufficio;

	#[NotNull]
	#[NotBlank]
	#[Length(max: 20)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumeroREA;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $CapitaleSociale;
	private array $SocioUnico_array = ['SU', 'SM'];
	public string $SocioUnico;
	private array $StatoLiquidazione_array = ['LS', 'LN'];

	#[NotNull]
	#[NotBlank]
	public string $StatoLiquidazione;
}
