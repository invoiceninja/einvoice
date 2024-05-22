<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ScontoMaggiorazioneType;

use Carbon\Carbon;

class ScontoMaggiorazione
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public string $Tipo;
	private array $Tipo_array = ['SC', 'MG'];

	#[\Symfony\Component\Validator\Constraints\Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $Percentuale;

	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $Importo;
}
