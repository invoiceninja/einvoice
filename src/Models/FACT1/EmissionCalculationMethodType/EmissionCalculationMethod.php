<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\EmissionCalculationMethodType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\MeasurementFromLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\MeasurementToLocation;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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
