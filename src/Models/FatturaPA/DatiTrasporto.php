<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiVettoreType\DatiAnagraficiVettore;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\IndirizzoResa;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiTrasporto extends Data
{
	public DatiAnagraficiVettore|Optional $DatiAnagraficiVettore;
	public string|Optional $MezzoTrasporto;
	public string|Optional $CausaleTrasporto;
	public int|Optional $NumeroColli;
	public string|Optional $Descrizione;
	public string|Optional $UnitaMisuraPeso;
	public float|Optional $PesoLordo;
	public float|Optional $PesoNetto;
	public Carbon|Optional $DataOraRitiro;
	public Carbon|Optional $DataInizioTrasporto;
	public string|Optional $TipoResa;
	public IndirizzoResa|Optional $IndirizzoResa;
	public Carbon|Optional $DataOraConsegna;
}
