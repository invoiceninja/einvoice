<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiRitenutaType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiRitenuta extends Data
{
	#[Required]
	public string $TipoRitenuta;
	private array $TipoRitenuta_array = ['RT01', 'RT02', 'RT03', 'RT04', 'RT05', 'RT06'];

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImportoRitenuta;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $AliquotaRitenuta;

	#[Required]
	public string $CausalePagamento;

	private array $CausalePagamento_array = [
		'A',
		'B',
		'C',
		'D',
		'E',
		'G',
		'H',
		'I',
		'L',
		'M',
		'N',
		'O',
		'P',
		'Q',
		'R',
		'S',
		'T',
		'U',
		'V',
		'W',
		'X',
		'Y',
		'Z',
		'L1',
		'M1',
		'M2',
		'O1',
		'V1',
		'ZO',
	];
}
