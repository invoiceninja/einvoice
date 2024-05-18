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
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Despatch extends Data
{
	public string|Optional $ID;
	public Carbon|Optional $RequestedDespatchDate;
	public \time|Optional $RequestedDespatchTime;
	public Carbon|Optional $EstimatedDespatchDate;
	public \time|Optional $EstimatedDespatchTime;
	public Carbon|Optional $ActualDespatchDate;
	public \time|Optional $ActualDespatchTime;
	public Carbon|Optional $GuaranteedDespatchDate;
	public \time|Optional $GuaranteedDespatchTime;
	public string|Optional $ReleaseID;
	public string|Optional $Instructions;
	public DespatchAddress|Optional $DespatchAddress;
	public DespatchLocation|Optional $DespatchLocation;
	public DespatchParty|Optional $DespatchParty;
	public CarrierParty|Optional $CarrierParty;
	public NotifyParty|Optional $NotifyParty;
	public Contact|Optional $Contact;
	public EstimatedDespatchPeriod|Optional $EstimatedDespatchPeriod;
	public RequestedDespatchPeriod|Optional $RequestedDespatchPeriod;
}
