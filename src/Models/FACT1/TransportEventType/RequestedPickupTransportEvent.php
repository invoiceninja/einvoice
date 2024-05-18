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

class RequestedPickupTransportEvent extends Data
{
	public string|Optional $IdentificationID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $OccurrenceDate;
	public \time|Optional $OccurrenceTime;
	public string|Optional $TransportEventTypeCode;
	public string|Optional $Description;
	public \boolean|Optional $CompletionIndicator;
	public ReportedShipment|Optional $ReportedShipment;
	public CurrentStatus|Optional $CurrentStatus;
	public Contact|Optional $Contact;
	public Location|Optional $Location;
	public Signature|Optional $Signature;
	public Period|Optional $Period;
}
