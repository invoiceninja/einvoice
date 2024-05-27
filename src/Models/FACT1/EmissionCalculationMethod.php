<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\LocationType\MeasurementFromLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\MeasurementToLocation;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class EmissionCalculationMethod
{
	/** @var string */
	#[SerializedName('cbc:CalculationMethodCode')]
	public string $CalculationMethodCode;

	/** @var string */
	#[SerializedName('cbc:FullnessIndicationCode')]
	public string $FullnessIndicationCode;

	/** @var MeasurementFromLocation */
	#[SerializedName('cac:MeasurementFromLocation')]
	public $MeasurementFromLocation;

	/** @var MeasurementToLocation */
	#[SerializedName('cac:MeasurementToLocation')]
	public $MeasurementToLocation;
}
