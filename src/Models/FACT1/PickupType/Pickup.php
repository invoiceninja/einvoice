<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PickupType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\PickupLocation;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\PickupParty;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class Pickup extends Data
{
	public string|Optional $ID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ActualPickupDate;
	public \time|Optional $ActualPickupTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $EarliestPickupDate;
	public \time|Optional $EarliestPickupTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $LatestPickupDate;
	public \time|Optional $LatestPickupTime;
	public PickupLocation|Optional $PickupLocation;
	public PickupParty|Optional $PickupParty;
}
