<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\ItemType\Item;
use Invoiceninja\Einvoice\Models\FACT1\OrderLineReferenceType\OrderLineReference;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\Shipment;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DespatchLine extends Data
{
	#[Required]
	public string $ID;
	public string|Optional $UUID;

	/** @param array<Note> $Note */
	public array|Optional $Note;
	public string|Optional $LineStatusCode;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeliveredQuantity;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $BackorderQuantity;

	/** @param array<BackorderReason> $BackorderReason */
	public array|Optional $BackorderReason;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $OutstandingQuantity;

	/** @param array<OutstandingReason> $OutstandingReason */
	public array|Optional $OutstandingReason;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $OversupplyQuantity;

	/** @param array<OrderLineReference> $OrderLineReference */
	#[Required]
	public array $OrderLineReference;

	/** @param array<DocumentReference> $DocumentReference */
	public array|Optional $DocumentReference;

	#[Required]
	public Item $Item;

	/** @param array<Shipment> $Shipment */
	public array|Optional $Shipment;
}
