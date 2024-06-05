<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\EmissionCalculationMethodType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\LocationType\MeasurementFromLocation;
use Invoiceninja\Einvoice\Models\Peppol\LocationType\MeasurementToLocation;
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
