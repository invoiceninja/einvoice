<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class DatiRitenuta extends Data
{
	private array $TipoRitenuta_array = ['RT01', 'RT02', 'RT03', 'RT04', 'RT05', 'RT06'];

	#[Required]
	#[\Spatie\LaravelData\Attributes\Validation\In(
		RT01: 'Ritenuta di acconto persone fisiche',
		RT02: 'Ritenuta di acconto persone giuridiche',
		RT03: 'Contributo INPS',
		RT04: 'Contributo ENASARCO',
		RT05: 'Contributo ENPAM',
		RT06: 'Altro contributo previdenziale',
	)]
	public string $TipoRitenuta;

	#[Required]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $ImportoRitenuta;

	#[Required]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $AliquotaRitenuta;

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

	#[Required]
	#[\Spatie\LaravelData\Attributes\Validation\In(
		A: 'A',
		B: 'B',
		C: 'C',
		D: 'D',
		E: 'E',
		G: 'G',
		H: 'H',
		I: 'I',
		L: 'L',
		M: 'M',
		N: 'N',
		O: 'O',
		P: 'P',
		Q: 'Q',
		R: 'R',
		S: 'S',
		T: 'T',
		U: 'U',
		V: 'V',
		W: 'W',
		X: 'X',
		Y: 'Y',
		Z: 'Z',
		L1: 'L1',
		M1: 'M1',
		M2: 'M2',
		O1: 'O1',
		V1: 'V1',
		ZO: 'ZO',
	)]
	public string $CausalePagamento;
}
