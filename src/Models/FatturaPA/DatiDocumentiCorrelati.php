<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DatiDocumentiCorrelati extends Data
{
	public int|Optional $RiferimentoNumeroLinea;
	public ?string $IdDocumento;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $Data;
	public string|Optional $NumItem;
	public string|Optional $CodiceCommessaConvenzione;
	public string|Optional $CodiceCUP;
	public string|Optional $CodiceCIG;
}
