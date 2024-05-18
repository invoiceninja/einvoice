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
	public ?string $MezzoTrasporto;
	public ?string $CausaleTrasporto;
	public ?int $NumeroColli;
	public ?string $Descrizione;
	public ?string $UnitaMisuraPeso;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $PesoLordo;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $PesoNetto;
	public Carbon|Optional $DataOraRitiro;
	public Carbon|Optional $DataInizioTrasporto;
	public ?string $TipoResa;
	public IndirizzoResa|Optional $IndirizzoResa;
	public Carbon|Optional $DataOraConsegna;
}
