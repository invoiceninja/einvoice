<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\LotIdentificationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyType\AdditionalItemProperty;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class LotIdentification extends Data
{
	public string|Optional $LotNumberID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ExpiryDate;

	#[DataCollectionOf('AdditionalItemProperty')]
	public AdditionalItemProperty|Optional $AdditionalItemProperty;
}
