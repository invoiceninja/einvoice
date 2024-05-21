<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ScontoMaggiorazione extends Data
{
	private array $Tipo_array = ['SC' => 'SC = Sconto', 'MG' => 'MG = Maggiorazione'];

	#[Required]
	#[\Spatie\LaravelData\Attributes\Validation\In(SC: 'SC = Sconto', MG: 'MG = Maggiorazione')]
	public ?string $Tipo;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Percentuale;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Importo;
}
