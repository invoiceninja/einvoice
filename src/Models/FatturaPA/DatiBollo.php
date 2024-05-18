<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiBollo extends Data
{
	public ?string $BolloVirtuale;
	public array $BolloVirtuale_array = ['SI' => 'SI'];

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $ImportoBollo;
}
