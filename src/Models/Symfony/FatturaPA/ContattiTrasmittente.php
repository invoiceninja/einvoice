<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class ContattiTrasmittente
{
	#[Length(max: 12)]
	#[Length(min: 5)]
	#[Regex('/[\x{0020}-\x{007E}]{5,12}/u')]
	public string $Telefono;

	#[Length(max: 256)]
	#[Length(min: 7)]
	#[Regex('/.+@.+[.]+.+/')]
	public string $Email;
}
