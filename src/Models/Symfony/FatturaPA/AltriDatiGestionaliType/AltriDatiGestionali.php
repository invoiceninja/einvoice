<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AltriDatiGestionaliType;

use Carbon\Carbon;

class AltriDatiGestionali
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Length(max: 10)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $TipoDato;

	#[\Symfony\Component\Validator\Constraints\Length(max: 60)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $RiferimentoTesto;

	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $RiferimentoNumero;

	#[\Symfony\Component\Validator\Constraints\Date('Y-m-d')]
	public Carbon $RiferimentoData;
}
