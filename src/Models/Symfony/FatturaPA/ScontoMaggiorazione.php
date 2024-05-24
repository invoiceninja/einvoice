<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Regex;

class ScontoMaggiorazione
{
	private array $Tipo_array = ['SC', 'MG'];

	#[Choice(['SC', 'MG'])]
	public string $Tipo;

	#[DecimalPrecision(2)]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float|string $Percentuale;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float|string $Importo;
}
