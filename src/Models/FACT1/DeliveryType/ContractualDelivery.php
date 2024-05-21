<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\DeliveryType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\DeliveryAddress;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryTermsType\DeliveryTerms;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\MaximumDeliveryUnit;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\MinimumDeliveryUnit;
use Invoiceninja\Einvoice\Models\FACT1\DespatchType\Despatch;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\AlternativeDeliveryLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\DeliveryLocation;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\CarrierParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\DeliveryParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\NotifyParty;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\EstimatedDeliveryPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\PromisedDeliveryPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\RequestedDeliveryPeriod;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\Shipment;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ContractualDelivery extends Data
{
	public string|Optional $ID;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Quantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $MinimumQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $MaximumQuantity;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ActualDeliveryDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $ActualDeliveryTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $LatestDeliveryDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $LatestDeliveryTime;
	public string|Optional $ReleaseID;
	public string|Optional $TrackingID;
	public DeliveryAddress|Optional $DeliveryAddress;
	public DeliveryLocation|Optional $DeliveryLocation;
	public AlternativeDeliveryLocation|Optional $AlternativeDeliveryLocation;
	public RequestedDeliveryPeriod|Optional $RequestedDeliveryPeriod;
	public PromisedDeliveryPeriod|Optional $PromisedDeliveryPeriod;
	public EstimatedDeliveryPeriod|Optional $EstimatedDeliveryPeriod;
	public CarrierParty|Optional $CarrierParty;
	public DeliveryParty|Optional $DeliveryParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyType\NotifyParty')]
	public NotifyParty|Optional $NotifyParty;
	public Despatch|Optional $Despatch;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DeliveryTermsType\DeliveryTerms')]
	public DeliveryTerms|Optional $DeliveryTerms;
	public MinimumDeliveryUnit|Optional $MinimumDeliveryUnit;
	public MaximumDeliveryUnit|Optional $MaximumDeliveryUnit;
	public Shipment|Optional $Shipment;
}
