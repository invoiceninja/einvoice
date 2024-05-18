<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

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
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Delivery extends Data
{
	public string|Optional $ID;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Quantity;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $MinimumQuantity;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $MaximumQuantity;
	public Carbon|Optional $ActualDeliveryDate;
	public \time|Optional $ActualDeliveryTime;
	public Carbon|Optional $LatestDeliveryDate;
	public \time|Optional $LatestDeliveryTime;
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
	public NotifyParty|Optional $NotifyParty;
	public Despatch|Optional $Despatch;
	public DeliveryTerms|Optional $DeliveryTerms;
	public MinimumDeliveryUnit|Optional $MinimumDeliveryUnit;
	public MaximumDeliveryUnit|Optional $MaximumDeliveryUnit;
	public Shipment|Optional $Shipment;
}
