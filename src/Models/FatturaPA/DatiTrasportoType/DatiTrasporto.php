<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiTrasportoType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiVettoreType\DatiAnagraficiVettore;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\IndirizzoResa;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DatiTrasporto extends Data
{
	public DatiAnagraficiVettore|Optional $DatiAnagraficiVettore;

	#[Max(80)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string|Optional $MezzoTrasporto;

	#[Max(100)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string|Optional $CausaleTrasporto;
	public int|Optional $NumeroColli;

	#[Max(100)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string|Optional $Descrizione;

	#[Max(10)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string|Optional $UnitaMisuraPeso;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[0-9]{1,4}\.[0-9]{1,2}/')]
	public float|Optional $PesoLordo;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[0-9]{1,4}\.[0-9]{1,2}/')]
	public float|Optional $PesoNetto;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $DataOraRitiro;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $DataInizioTrasporto;

	#[Max(3)]
	#[Min(3)]
	#[Regex('/[A-Z]{3}/')]
	public string|Optional $TipoResa;
	public IndirizzoResa|Optional $IndirizzoResa;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $DataOraConsegna;
}
