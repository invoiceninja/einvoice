<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ContattiTrasmittenteType;

use Carbon\Carbon;

class ContattiTrasmittente
{
	#[\Symfony\Component\Validator\Constraints\Length(max: 12)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 5)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{5,12}/u')]
	public string $Telefono;

	#[\Symfony\Component\Validator\Constraints\Length(max: 256)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 7)]
	#[\Symfony\Component\Validator\Constraints\Regex('/.+@.+[.]+.+/')]
	public string $Email;
}
