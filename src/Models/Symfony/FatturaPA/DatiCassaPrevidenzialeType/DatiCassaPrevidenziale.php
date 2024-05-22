<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiCassaPrevidenzialeType;

use Carbon\Carbon;

class DatiCassaPrevidenziale
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public string $TipoCassa;

	private array $TipoCassa_array = [
		'TC01',
		'TC02',
		'TC03',
		'TC04',
		'TC05',
		'TC06',
		'TC07',
		'TC08',
		'TC09',
		'TC10',
		'TC11',
		'TC12',
		'TC13',
		'TC14',
		'TC15',
		'TC16',
		'TC17',
		'TC18',
		'TC19',
		'TC20',
		'TC21',
		'TC22',
	];

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $AlCassa;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImportoContributoCassa;

	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImponibileCassa;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $AliquotaIVA;
	public string $Ritenuta;
	private array $Ritenuta_array = ['SI'];
	public string $Natura;

	private array $Natura_array = [
		'N1',
		'N2',
		'N2.1',
		'N2.2',
		'N3',
		'N3.1',
		'N3.2',
		'N3.3',
		'N3.4',
		'N3.5',
		'N3.6',
		'N4',
		'N5',
		'N6',
		'N6.1',
		'N6.2',
		'N6.3',
		'N6.4',
		'N6.5',
		'N6.6',
		'N6.7',
		'N6.8',
		'N6.9',
		'N7',
	];

	#[\Symfony\Component\Validator\Constraints\Length(max: 20)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $RiferimentoAmministrazione;
}
