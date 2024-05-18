<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiBolloType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiBollo extends Data
{
	public string $BolloVirtuale;
	public array $BolloVirtuale_array = ['SI' => 'SI'];

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|Optional $ImportoBollo;
}
