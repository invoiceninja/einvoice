<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\AltitudeMeasureType\AltitudeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\CoordinateSystemCodeType\CoordinateSystemCode;
use InvoiceNinja\EInvoice\Models\Peppol\LatitudeDegreesMeasureType\LatitudeDegreesMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\LatitudeDirectionCodeType\LatitudeDirectionCode;
use InvoiceNinja\EInvoice\Models\Peppol\LatitudeMinutesMeasureType\LatitudeMinutesMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\LongitudeDegreesMeasureType\LongitudeDegreesMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\LongitudeDirectionCodeType\LongitudeDirectionCode;
use InvoiceNinja\EInvoice\Models\Peppol\LongitudeMinutesMeasureType\LongitudeMinutesMeasure;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

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
