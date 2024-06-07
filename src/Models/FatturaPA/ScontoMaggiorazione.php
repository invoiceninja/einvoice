<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Regex;

class ScontoMaggiorazione
{
	private array $Tipo_array = ['SC', 'MG'];

	/** @var string */
	#[Choice(['SC', 'MG'])]
	public string $Tipo;

	/** @var string */
	#[DecimalPrecision(2)]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public string $Percentuale;

	/** @var string */
	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public string $Importo;
}
