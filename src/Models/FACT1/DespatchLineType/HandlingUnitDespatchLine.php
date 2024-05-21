<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\DespatchLineType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\ItemType\Item;
use Invoiceninja\Einvoice\Models\FACT1\OrderLineReferenceType\OrderLineReference;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\Shipment;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class HandlingUnitDespatchLine extends Data
{
	#[Required]
	public string $ID;
	public string|Optional $UUID;

	#[DataCollectionOf('Note')]
	public string|Optional $Note;
	public string|Optional $LineStatusCode;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeliveredQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $BackorderQuantity;

	#[DataCollectionOf('BackorderReason')]
	public string|Optional $BackorderReason;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $OutstandingQuantity;

	#[DataCollectionOf('OutstandingReason')]
	public string|Optional $OutstandingReason;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $OversupplyQuantity;

	#[Required]
	#[DataCollectionOf('OrderLineReference')]
	public DataCollection $OrderLineReference;

	#[DataCollectionOf('DocumentReference')]
	public DocumentReference|Optional $DocumentReference;

	#[Required]
	public Item $Item;

	#[DataCollectionOf('Shipment')]
	public Shipment|Optional $Shipment;
}
