<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiDocumentiCorrelati extends Data
{
	public int|Optional $RiferimentoNumeroLinea;
	public string $IdDocumento;
	public Carbon|Optional $Data;
	public string|Optional $NumItem;
	public string|Optional $CodiceCommessaConvenzione;
	public string|Optional $CodiceCUP;
	public string|Optional $CodiceCIG;
}
