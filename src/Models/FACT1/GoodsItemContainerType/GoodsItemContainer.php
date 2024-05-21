<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\GoodsItemContainerType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\TransportEquipment;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class GoodsItemContainer extends Data
{
	#[Required]
	public string $ID;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Quantity;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\TransportEquipment')]
	public TransportEquipment|Optional $TransportEquipment;
}
