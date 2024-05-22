<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AnagraficaType\Anagrafica;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IdFiscaleType\IdFiscaleIVA;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiAnagraficiCessionario
{
	public IdFiscaleIVA $IdFiscaleIVA;

	#[Length(max: 16)]
	#[Length(min: 11)]
	#[Regex('/[A-Z0-9]{11,16}/')]
	public string $CodiceFiscale;

	#[NotNull]
	#[NotBlank]
	public Anagrafica $Anagrafica;
}