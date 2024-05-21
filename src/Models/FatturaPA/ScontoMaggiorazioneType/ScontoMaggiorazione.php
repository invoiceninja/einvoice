<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\ScontoMaggiorazioneType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ScontoMaggiorazione extends Data
{
	#[Required]
	public string $Tipo;
	private array $Tipo_array = ['SC', 'MG'];

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float|Optional $Percentuale;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float|Optional $Importo;
}
