<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentSealType;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TransportEquipmentSeal extends Data
{
	public ?string $ID;
	public string|Optional $SealIssuerTypeCode;
	public string|Optional $Condition;
	public string|Optional $SealStatusCode;
	public string|Optional $SealingPartyType;
}
