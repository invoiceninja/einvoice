<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiBolloType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiBollo extends Data
{
	public string $BolloVirtuale;
	public array $BolloVirtuale_array = ['SI' => 'SI'];

	#[Regex('[\-]?[0-9]{1,11}\.[0-9]{2}')]
	public float|Optional $ImportoBollo;
}
