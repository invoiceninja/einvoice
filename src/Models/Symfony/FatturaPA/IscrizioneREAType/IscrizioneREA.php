<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IscrizioneREAType;

use Carbon\Carbon;

class IscrizioneREA
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Length(max: 2)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 2)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[A-Z]{2}/')]
	public string $Ufficio;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Length(max: 20)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumeroREA;

	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $CapitaleSociale;

	#[\Symfony\Component\Validator\Constraints\Choice('SU', 'SM')]
	public string $SocioUnico;
	private array $SocioUnico_array = ['SU', 'SM'];

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Choice('LS', 'LN')]
	public string $StatoLiquidazione;
	private array $StatoLiquidazione_array = ['LS', 'LN'];
}
