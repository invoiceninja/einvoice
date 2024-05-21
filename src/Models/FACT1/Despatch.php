<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\DespatchAddress;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\Contact;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\DespatchLocation;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\CarrierParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\DespatchParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\NotifyParty;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\EstimatedDespatchPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\RequestedDespatchPeriod;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class Despatch extends Data
{
	public string|Optional $ID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $RequestedDespatchDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $RequestedDespatchTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $EstimatedDespatchDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $EstimatedDespatchTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ActualDespatchDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $ActualDespatchTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $GuaranteedDespatchDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $GuaranteedDespatchTime;
	public string|Optional $ReleaseID;

	#[DataCollectionOf('string')]
	public string|Optional $Instructions;
	public DespatchAddress|Optional $DespatchAddress;
	public DespatchLocation|Optional $DespatchLocation;
	public DespatchParty|Optional $DespatchParty;
	public CarrierParty|Optional $CarrierParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyType\NotifyParty')]
	public NotifyParty|Optional $NotifyParty;
	public Contact|Optional $Contact;
	public EstimatedDespatchPeriod|Optional $EstimatedDespatchPeriod;
	public RequestedDespatchPeriod|Optional $RequestedDespatchPeriod;
}
