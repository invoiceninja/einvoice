<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiVettoreType\DatiAnagraficiVettore;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\IndirizzoResa;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiTrasporto
{
	public DatiAnagraficiVettore $DatiAnagraficiVettore;

	#[Length(max: 80)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string $MezzoTrasporto;

	#[Length(max: 100)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $CausaleTrasporto;
	public int $NumeroColli;

	#[Length(max: 100)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $Descrizione;

	#[Length(max: 10)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $UnitaMisuraPeso;

	#[Regex('/[0-9]{1,4}\.[0-9]{1,2}/')]
	public float $PesoLordo;

	#[Regex('/[0-9]{1,4}\.[0-9]{1,2}/')]
	public float $PesoNetto;
	public Carbon $DataOraRitiro;
	public Carbon $DataInizioTrasporto;

	#[Length(max: 3)]
	#[Length(min: 3)]
	#[Regex('/[A-Z]{3}/')]
	public string $TipoResa;
	public IndirizzoResa $IndirizzoResa;
	public Carbon $DataOraConsegna;
}
