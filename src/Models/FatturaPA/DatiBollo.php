<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiBollo extends Data
{
	private array $BolloVirtuale_array = ['SI'];

	#[Required]
	#[\Spatie\LaravelData\Attributes\Validation\In(SI: 'SI')]
	public string $BolloVirtuale;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ImportoBollo;
}
