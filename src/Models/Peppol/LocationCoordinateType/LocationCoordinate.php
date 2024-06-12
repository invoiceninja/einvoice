<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\LocationCoordinateType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CoordinateSystemCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\LatitudeDirectionCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\LongitudeDirectionCode;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\AltitudeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\LatitudeDegreesMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\LatitudeMinutesMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\LongitudeDegreesMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\LongitudeMinutesMeasure;
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

class LocationCoordinate
{
	/** @var CoordinateSystemCode */
	#[SerializedName('cbc:CoordinateSystemCode')]
	public $CoordinateSystemCode;

	/** @var LatitudeDegreesMeasure */
	#[SerializedName('cbc:LatitudeDegreesMeasure')]
	public $LatitudeDegreesMeasure;

	/** @var LatitudeMinutesMeasure */
	#[SerializedName('cbc:LatitudeMinutesMeasure')]
	public $LatitudeMinutesMeasure;

	/** @var LatitudeDirectionCode */
	#[SerializedName('cbc:LatitudeDirectionCode')]
	public $LatitudeDirectionCode;

	/** @var LongitudeDegreesMeasure */
	#[SerializedName('cbc:LongitudeDegreesMeasure')]
	public $LongitudeDegreesMeasure;

	/** @var LongitudeMinutesMeasure */
	#[SerializedName('cbc:LongitudeMinutesMeasure')]
	public $LongitudeMinutesMeasure;

	/** @var LongitudeDirectionCode */
	#[SerializedName('cbc:LongitudeDirectionCode')]
	public $LongitudeDirectionCode;

	/** @var AltitudeMeasure */
	#[SerializedName('cbc:AltitudeMeasure')]
	public $AltitudeMeasure;
}
