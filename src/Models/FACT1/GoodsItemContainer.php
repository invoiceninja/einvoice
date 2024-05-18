<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\TransportEquipment;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GoodsItemContainer extends Data
{
	public ?string $ID;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Quantity;
	public TransportEquipment|Optional $TransportEquipment;
}
