<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBolloType;

use Carbon\Carbon;

class DatiBollo
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public string $BolloVirtuale;
	private array $BolloVirtuale_array = ['SI'];

	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImportoBollo;
}
