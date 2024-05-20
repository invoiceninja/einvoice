<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ItemInstanceType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyType\AdditionalItemProperty;
use Invoiceninja\Einvoice\Models\FACT1\LotIdentificationType\LotIdentification;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ItemInstance extends Data
{
	public string|Optional $ProductTraceID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ManufactureDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $ManufactureTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $BestBeforeDate;
	public string|Optional $RegistrationID;
	public string|Optional $SerialID;
	public AdditionalItemProperty|Optional $AdditionalItemProperty;
	public LotIdentification|Optional $LotIdentification;
}
