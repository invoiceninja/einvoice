<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiDocumentiCorrelati extends Data
{
	public ?int $RiferimentoNumeroLinea;
	public ?string $IdDocumento;
	public Carbon|Optional $Data;
	public ?string $NumItem;
	public ?string $CodiceCommessaConvenzione;
	public ?string $CodiceCUP;
	public ?string $CodiceCIG;
}
