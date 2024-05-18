<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AltriDatiGestionali extends Data
{
	public ?string $TipoDato;
	public ?string $RiferimentoTesto;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $RiferimentoNumero;
	public Carbon|Optional $RiferimentoData;
}
