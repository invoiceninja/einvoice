<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRitenutaType;

use Carbon\Carbon;

class DatiRitenuta
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public string $TipoRitenuta;
	private array $TipoRitenuta_array = ['RT01', 'RT02', 'RT03', 'RT04', 'RT05', 'RT06'];

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImportoRitenuta;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $AliquotaRitenuta;

	#[\Symfony\Component\Validator\Constraints\NotNull]
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
