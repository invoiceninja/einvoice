<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransportEventType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\Contact;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\Location;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\Period;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\ReportedShipment;
use Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature;
use Invoiceninja\Einvoice\Models\FACT1\StatusType\CurrentStatus;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class RequestedPickupTransportEvent extends Data
{
	public string|Optional $IdentificationID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $OccurrenceDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $OccurrenceTime;
	public string|Optional $TransportEventTypeCode;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $Description;
	public bool|Optional $CompletionIndicator;
	public ReportedShipment|Optional $ReportedShipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\StatusType\CurrentStatus')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public CurrentStatus|Optional $CurrentStatus;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ContactType\Contact')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public Contact|Optional $Contact;
	public Location|Optional $Location;
	public Signature|Optional $Signature;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PeriodType\Period')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public Period|Optional $Period;
}
