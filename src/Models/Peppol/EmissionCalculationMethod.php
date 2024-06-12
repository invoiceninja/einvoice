<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CalculationMethodCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\FullnessIndicationCode;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\MeasurementFromLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\MeasurementToLocation;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class EmissionCalculationMethod
{
	/** @var CalculationMethodCode */
	#[SerializedName('cbc:CalculationMethodCode')]
	public $CalculationMethodCode;

	/** @var FullnessIndicationCode */
	#[SerializedName('cbc:FullnessIndicationCode')]
	public $FullnessIndicationCode;

	/** @var MeasurementFromLocation */
	#[SerializedName('cac:MeasurementFromLocation')]
	public $MeasurementFromLocation;

	/** @var MeasurementToLocation */
	#[SerializedName('cac:MeasurementToLocation')]
	public $MeasurementToLocation;
}
