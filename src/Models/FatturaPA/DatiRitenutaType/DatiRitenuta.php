<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiRitenutaType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiRitenuta extends Data
{
	#[Required]
	public ?string $TipoRitenuta;

	private array $TipoRitenuta_array = [
		'RT01' => 'Ritenuta di acconto persone fisiche',
		'RT02' => 'Ritenuta di acconto persone giuridiche',
		'RT03' => 'Contributo INPS',
		'RT04' => 'Contributo ENASARCO',
		'RT05' => 'Contributo ENPAM',
		'RT06' => 'Altro contributo previdenziale',
	];

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public ?float $ImportoRitenuta;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public ?float $AliquotaRitenuta;

	#[Required]
	public ?string $CausalePagamento;

	private array $CausalePagamento_array = [
		'A' => 'A',
		'B' => 'B',
		'C' => 'C',
		'D' => 'D',
		'E' => 'E',
		'G' => 'G',
		'H' => 'H',
		'I' => 'I',
		'L' => 'L',
		'M' => 'M',
		'N' => 'N',
		'O' => 'O',
		'P' => 'P',
		'Q' => 'Q',
		'R' => 'R',
		'S' => 'S',
		'T' => 'T',
		'U' => 'U',
		'V' => 'V',
		'W' => 'W',
		'X' => 'X',
		'Y' => 'Y',
		'Z' => 'Z',
		'L1' => 'L1',
		'M1' => 'M1',
		'M2' => 'M2',
		'O1' => 'O1',
		'V1' => 'V1',
		'ZO' => 'ZO',
	];
}
