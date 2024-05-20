<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiVettoreType\DatiAnagraficiVettore;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\IndirizzoResa;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DatiTrasporto extends Data
{
	public DatiAnagraficiVettore|Optional $DatiAnagraficiVettore;
	public string|Optional $MezzoTrasporto;
	public string|Optional $CausaleTrasporto;
	public int|Optional $NumeroColli;
	public string|Optional $Descrizione;
	public string|Optional $UnitaMisuraPeso;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PesoLordo;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PesoNetto;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $DataOraRitiro;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataInizioTrasporto;
	public string|Optional $TipoResa;
	public IndirizzoResa|Optional $IndirizzoResa;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $DataOraConsegna;
}
