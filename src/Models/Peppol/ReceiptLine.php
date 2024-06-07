<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\ItemType\Item;
use InvoiceNinja\EInvoice\Models\Peppol\LineReferenceType\DespatchLineReference;
use InvoiceNinja\EInvoice\Models\Peppol\OrderLineReferenceType\OrderLineReference;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\OversupplyQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ReceivedQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\RejectedQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ShortQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\Shipment;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class ReceiptLine
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:UUID')]
	public string $UUID;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var ReceivedQuantity */
	#[SerializedName('cbc:ReceivedQuantity')]
	public $ReceivedQuantity;

	/** @var ShortQuantity */
	#[SerializedName('cbc:ShortQuantity')]
	public $ShortQuantity;

	/** @var string */
	#[SerializedName('cbc:ShortageActionCode')]
	public string $ShortageActionCode;

	/** @var RejectedQuantity */
	#[SerializedName('cbc:RejectedQuantity')]
	public $RejectedQuantity;

	/** @var string */
	#[SerializedName('cbc:RejectReasonCode')]
	public string $RejectReasonCode;

	/** @var string */
	#[SerializedName('cbc:RejectReason')]
	public string $RejectReason;

	/** @var string */
	#[SerializedName('cbc:RejectActionCode')]
	public string $RejectActionCode;

	/** @var string */
	#[SerializedName('cbc:QuantityDiscrepancyCode')]
	public string $QuantityDiscrepancyCode;

	/** @var OversupplyQuantity */
	#[SerializedName('cbc:OversupplyQuantity')]
	public $OversupplyQuantity;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ReceivedDate')]
	public DateTime $ReceivedDate;

	/** @var string */
	#[SerializedName('cbc:TimingComplaintCode')]
	public string $TimingComplaintCode;

	/** @var string */
	#[SerializedName('cbc:TimingComplaint')]
	public string $TimingComplaint;

	/** @var OrderLineReference */
	#[SerializedName('cac:OrderLineReference')]
	public $OrderLineReference;

	/** @var DespatchLineReference[] */
	#[SerializedName('cac:DespatchLineReference')]
	public array $DespatchLineReference;

	/** @var DocumentReference[] */
	#[SerializedName('cac:DocumentReference')]
	public array $DocumentReference;

	/** @var Item[] */
	#[SerializedName('cac:Item')]
	public array $Item;

	/** @var Shipment[] */
	#[SerializedName('cac:Shipment')]
	public array $Shipment;
}
