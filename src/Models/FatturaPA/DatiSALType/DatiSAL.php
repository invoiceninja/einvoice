<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiSALType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiSAL extends Data
{
	#[Required]
	public int $RiferimentoFase;
}
