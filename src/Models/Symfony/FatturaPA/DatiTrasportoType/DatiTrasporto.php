<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiTrasportoType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiVettoreType\DatiAnagraficiVettore;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\IndirizzoResa;

class DatiTrasporto
{
	public DatiAnagraficiVettore $DatiAnagraficiVettore;

	#[\Symfony\Component\Validator\Constraints\Length(max: 80)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string $MezzoTrasporto;

	#[\Symfony\Component\Validator\Constraints\Length(max: 100)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $CausaleTrasporto;
	public int $NumeroColli;

	#[\Symfony\Component\Validator\Constraints\Length(max: 100)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $Descrizione;

	#[\Symfony\Component\Validator\Constraints\Length(max: 10)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $UnitaMisuraPeso;

	#[\Symfony\Component\Validator\Constraints\Regex('/[0-9]{1,4}\.[0-9]{1,2}/')]
	public float $PesoLordo;

	#[\Symfony\Component\Validator\Constraints\Regex('/[0-9]{1,4}\.[0-9]{1,2}/')]
	public float $PesoNetto;

	#[\Symfony\Component\Validator\Constraints\DateTime('Y-m-d\TH:i:s.uP')]
	public Carbon $DataOraRitiro;

	#[\Symfony\Component\Validator\Constraints\Date('Y-m-d')]
	public Carbon $DataInizioTrasporto;

	#[\Symfony\Component\Validator\Constraints\Length(max: 3)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 3)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[A-Z]{3}/')]
	public string $TipoResa;
	public IndirizzoResa $IndirizzoResa;

	#[\Symfony\Component\Validator\Constraints\DateTime('Y-m-d\TH:i:s.uP')]
	public Carbon $DataOraConsegna;
}
