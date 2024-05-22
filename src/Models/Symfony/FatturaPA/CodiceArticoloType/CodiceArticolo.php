<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CodiceArticoloType;

use Carbon\Carbon;

class CodiceArticolo
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Length(max: 35)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,35}/u')]
	public string $CodiceTipo;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Length(max: 35)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	public string $CodiceValore;
}
