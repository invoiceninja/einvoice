<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiVettoreType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType\IdFiscaleIVA;

class DatiAnagraficiVettore
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public IdFiscaleIVA $IdFiscaleIVA;

	#[\Symfony\Component\Validator\Constraints\Length(max: 16)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 11)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[A-Z0-9]{11,16}/')]
	public string $CodiceFiscale;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public Anagrafica $Anagrafica;

	#[\Symfony\Component\Validator\Constraints\Length(max: 20)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumeroLicenzaGuida;
}
