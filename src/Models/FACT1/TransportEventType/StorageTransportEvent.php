<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransportEventType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\Contact;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\Location;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\Period;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\ReportedShipment;
use Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature;
use Invoiceninja\Einvoice\Models\FACT1\StatusType\CurrentStatus;
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

class StorageTransportEvent
{
	/** @var string */
	#[SerializedName('cbc:IdentificationID')]
	public string $IdentificationID;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:OccurrenceDate')]
	public DateTime $OccurrenceDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:OccurrenceTime')]
	public DateTime $OccurrenceTime;

	/** @var string */
	#[SerializedName('cbc:TransportEventTypeCode')]
	public string $TransportEventTypeCode;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var bool */
	#[SerializedName('cbc:CompletionIndicator')]
	public bool $CompletionIndicator;

	/** @var ReportedShipment */
	#[SerializedName('cac:ReportedShipment')]
	public $ReportedShipment;

	/** @var CurrentStatus[] */
	#[SerializedName('cac:CurrentStatus')]
	public array $CurrentStatus;

	/** @var Contact[] */
	#[SerializedName('cac:Contact')]
	public array $Contact;

	/** @var Location */
	#[SerializedName('cac:Location')]
	public $Location;

	/** @var Signature */
	#[SerializedName('cac:Signature')]
	public $Signature;

	/** @var Period[] */
	#[SerializedName('cac:Period')]
	public array $Period;
}
