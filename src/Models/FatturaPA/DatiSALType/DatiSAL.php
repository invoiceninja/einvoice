<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiSALType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiSAL extends Data
{
	#[Required]
	public int $RiferimentoFase;
}
