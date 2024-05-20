<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\ItemType\Item;
use Invoiceninja\Einvoice\Models\FACT1\LineReferenceType\DespatchLineReference;
use Invoiceninja\Einvoice\Models\FACT1\OrderLineReferenceType\OrderLineReference;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\Shipment;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ReceiptLine extends Data
{
	public ?string $ID;
	public string|Optional $UUID;
	public string|Optional $Note;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ReceivedQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ShortQuantity;
	public string|Optional $ShortageActionCode;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $RejectedQuantity;
	public string|Optional $RejectReasonCode;
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
	public DespatchLineReference|Optional $DespatchLineReference;
	public DocumentReference|Optional $DocumentReference;
	public Item|Optional $Item;
	public Shipment|Optional $Shipment;
}
