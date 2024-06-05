<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\EmissionCalculationMethodType\EmissionCalculationMethod;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class EnvironmentalEmission
{
	/** @var string */
	#[SerializedName('cbc:EnvironmentalEmissionTypeCode')]
	public string $EnvironmentalEmissionTypeCode;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:ValueMeasure')]
	public string $ValueMeasure;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var EmissionCalculationMethod[] */
	#[SerializedName('cac:EmissionCalculationMethod')]
	public array $EmissionCalculationMethod;
}
