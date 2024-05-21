<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ReceiptLineType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\ItemType\Item;
use Invoiceninja\Einvoice\Models\FACT1\LineReferenceType\DespatchLineReference;
use Invoiceninja\Einvoice\Models\FACT1\OrderLineReferenceType\OrderLineReference;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\Shipment;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ReceivedHandlingUnitReceiptLine extends Data
{
	#[Required]
	public string $ID;
	public string|Optional $UUID;

	#[DataCollectionOf('Note')]
	public string|Optional $Note;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ReceivedQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ShortQuantity;
	public string|Optional $ShortageActionCode;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $RejectedQuantity;
	public string|Optional $RejectReasonCode;

	#[DataCollectionOf('RejectReason')]
	public string|Optional $RejectReason;
	public string|Optional $RejectActionCode;
	public string|Optional $QuantityDiscrepancyCode;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $OversupplyQuantity;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ReceivedDate;
	public string|Optional $TimingComplaintCode;
	public string|Optional $TimingComplaint;
	public OrderLineReference|Optional $OrderLineReference;

	#[DataCollectionOf('DespatchLineReference')]
	public DespatchLineReference|Optional $DespatchLineReference;

	#[DataCollectionOf('DocumentReference')]
	public DocumentReference|Optional $DocumentReference;

	#[DataCollectionOf('Item')]
	public Item|Optional $Item;

	#[DataCollectionOf('Shipment')]
	public Shipment|Optional $Shipment;
}
