<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\TerzoIntermediarioSoggettoEmittenteType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiTerzoIntermediarioType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TerzoIntermediarioOSoggettoEmittente extends Data
{
	#[Required]
	public DatiAnagrafici $DatiAnagrafici;
}
