<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransportEventType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\Contact;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\Location;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\Period;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\ReportedShipment;
use Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature;
use Invoiceninja\Einvoice\Models\FACT1\StatusType\CurrentStatus;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class PositioningTransportEvent extends Data
{
	public string|Optional $IdentificationID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $OccurrenceDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $OccurrenceTime;
	public string|Optional $TransportEventTypeCode;

	/** @param array<Description> $Description */
	public array|Optional $Description;
	public bool|Optional $CompletionIndicator;
	public ReportedShipment|Optional $ReportedShipment;

	/** @param array<CurrentStatus> $CurrentStatus */
	public array|Optional $CurrentStatus;

	/** @param array<Contact> $Contact */
	public array|Optional $Contact;
	public Location|Optional $Location;
	public Signature|Optional $Signature;

	/** @param array<Period> $Period */
	public array|Optional $Period;
}
