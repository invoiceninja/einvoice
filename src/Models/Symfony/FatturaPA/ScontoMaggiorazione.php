<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class ScontoMaggiorazione
{
	private array $Tipo_array = ['SC', 'MG'];

	#[NotNull]
	public string $Tipo;

	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $Percentuale;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $Importo;
}
