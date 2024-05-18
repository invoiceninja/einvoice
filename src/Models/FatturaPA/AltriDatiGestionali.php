<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AltriDatiGestionali extends Data
{
	public string $TipoDato;
	public string|Optional $RiferimentoTesto;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $RiferimentoNumero;
	public Carbon|Optional $RiferimentoData;
}
