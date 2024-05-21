<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiTerzoIntermediarioType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class TerzoIntermediarioSoggettoEmittente extends Data
{
	#[Required]
	public DatiAnagrafici $DatiAnagrafici;
}
