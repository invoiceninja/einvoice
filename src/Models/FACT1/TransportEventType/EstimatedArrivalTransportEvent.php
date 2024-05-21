<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransportEventType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\Contact;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\Location;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\Period;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\ReportedShipment;
use Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature;
use Invoiceninja\Einvoice\Models\FACT1\StatusType\CurrentStatus;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class EstimatedArrivalTransportEvent extends Data
{
	public string|Optional $IdentificationID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $OccurrenceDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $OccurrenceTime;
	public string|Optional $TransportEventTypeCode;

	#[DataCollectionOf('string')]
	public string|Optional $Description;
	public bool|Optional $CompletionIndicator;
	public ReportedShipment|Optional $ReportedShipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\StatusType\CurrentStatus')]
	public CurrentStatus|Optional $CurrentStatus;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ContactType\Contact')]
	public Contact|Optional $Contact;
	public Location|Optional $Location;
	public Signature|Optional $Signature;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PeriodType\Period')]
	public Period|Optional $Period;
}
