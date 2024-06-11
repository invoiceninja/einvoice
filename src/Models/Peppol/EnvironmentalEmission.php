<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\EmissionCalculationMethodType\EmissionCalculationMethod;
use InvoiceNinja\EInvoice\Models\Peppol\EnvironmentalEmissionTypeCodeType\EnvironmentalEmissionTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\ValueMeasureType\ValueMeasure;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class EnvironmentalEmission
{
	/** @var EnvironmentalEmissionTypeCode */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:EnvironmentalEmissionTypeCode')]
	public $EnvironmentalEmissionTypeCode;

	/** @var ValueMeasure */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ValueMeasure')]
	public $ValueMeasure;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var EmissionCalculationMethod[] */
	#[SerializedName('cac:EmissionCalculationMethod')]
	public array $EmissionCalculationMethod;
}
