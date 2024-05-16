<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class DatiRitenuta extends Data
{
	public string $TipoRitenuta;

	public array $TipoRitenuta_array = [
		'RT01' => 'Ritenuta di acconto persone fisiche',
		'RT02' => 'Ritenuta di acconto persone giuridiche',
		'RT03' => 'Contributo INPS',
		'RT04' => 'Contributo ENASARCO',
		'RT05' => 'Contributo ENPAM',
		'RT06' => 'Altro contributo previdenziale',
	];

	public float $ImportoRitenuta;
	public float $AliquotaRitenuta;
	public string $CausalePagamento;

	public array $CausalePagamento_array = [
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
