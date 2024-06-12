<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\TransportEventType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TransportEventTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\Contact;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\IdentificationID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\Location;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\Period;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\ReportedShipment;
use InvoiceNinja\EInvoice\Models\Peppol\SignatureType\Signature;
use InvoiceNinja\EInvoice\Models\Peppol\StatusType\CurrentStatus;
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

class QuarantineTransportEvent
{
	/** @var IdentificationID */
	#[SerializedName('cbc:IdentificationID')]
	public $IdentificationID;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:OccurrenceDate')]
	public DateTime $OccurrenceDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:OccurrenceTime')]
	public DateTime $OccurrenceTime;

	/** @var TransportEventTypeCode */
	#[SerializedName('cbc:TransportEventTypeCode')]
	public $TransportEventTypeCode;

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
