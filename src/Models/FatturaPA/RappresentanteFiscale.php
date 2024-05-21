<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiRappresentanteType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class RappresentanteFiscale extends Data
{
	#[Required]
	public DatiAnagrafici $DatiAnagrafici;
}
