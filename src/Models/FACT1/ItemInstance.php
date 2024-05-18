<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyType\AdditionalItemProperty;
use Invoiceninja\Einvoice\Models\FACT1\LotIdentificationType\LotIdentification;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ItemInstance extends Data
{
	public string|Optional $ProductTraceID;
	public Carbon|Optional $ManufactureDate;
	public \time|Optional $ManufactureTime;
	public Carbon|Optional $BestBeforeDate;
	public string|Optional $RegistrationID;
	public string|Optional $SerialID;
	public AdditionalItemProperty|Optional $AdditionalItemProperty;
	public LotIdentification|Optional $LotIdentification;
}
