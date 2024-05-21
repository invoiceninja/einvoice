<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiRappresentanteType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RappresentanteFiscale extends Data
{
	#[Required]
	public DatiAnagrafici $DatiAnagrafici;
}
