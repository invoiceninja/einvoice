<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\EmissionCalculationMethodType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\MeasurementFromLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\MeasurementToLocation;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

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
