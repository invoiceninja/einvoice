<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\DespatchLineType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\ItemType\Item;
use Invoiceninja\Einvoice\Models\FACT1\OrderLineReferenceType\OrderLineReference;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\Shipment;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class HandlingUnitDespatchLine extends Data
{
	#[Required]
	public string $ID;
	public string|Optional $UUID;

	/** @param array<Note> $Note */
	public array|Optional $Note;
	public string|Optional $LineStatusCode;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeliveredQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $BackorderQuantity;

	/** @param array<BackorderReason> $BackorderReason */
	public array|Optional $BackorderReason;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $OutstandingQuantity;

	/** @param array<OutstandingReason> $OutstandingReason */
	public array|Optional $OutstandingReason;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
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
