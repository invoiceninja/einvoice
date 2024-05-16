<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AltriDatiGestionali extends Data
{
	public string $TipoDato;
	public string|Optional $RiferimentoTesto;
	public float|Optional $RiferimentoNumero;
	public Carbon|Optional $RiferimentoData;
}
