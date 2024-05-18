<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\PickupLocation;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\PickupParty;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Pickup extends Data
{
	public string|Optional $ID;
	public Carbon|Optional $ActualPickupDate;
	public \time|Optional $ActualPickupTime;
	public Carbon|Optional $EarliestPickupDate;
	public \time|Optional $EarliestPickupTime;
	public Carbon|Optional $LatestPickupDate;
	public \time|Optional $LatestPickupTime;
	public PickupLocation|Optional $PickupLocation;
	public PickupParty|Optional $PickupParty;
}
