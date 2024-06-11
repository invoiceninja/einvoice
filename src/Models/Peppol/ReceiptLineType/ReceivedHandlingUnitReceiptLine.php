<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ReceiptLineType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\ItemType\Item;
use InvoiceNinja\EInvoice\Models\Peppol\LineReferenceType\DespatchLineReference;
use InvoiceNinja\EInvoice\Models\Peppol\OrderLineReferenceType\OrderLineReference;
use InvoiceNinja\EInvoice\Models\Peppol\OversupplyQuantityType\OversupplyQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityDiscrepancyCodeType\QuantityDiscrepancyCode;
use InvoiceNinja\EInvoice\Models\Peppol\ReceivedQuantityType\ReceivedQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\RejectActionCodeType\RejectActionCode;
use InvoiceNinja\EInvoice\Models\Peppol\RejectReasonCodeType\RejectReasonCode;
use InvoiceNinja\EInvoice\Models\Peppol\RejectedQuantityType\RejectedQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\Shipment;
use InvoiceNinja\EInvoice\Models\Peppol\ShortQuantityType\ShortQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\ShortageActionCodeType\ShortageActionCode;
use InvoiceNinja\EInvoice\Models\Peppol\TimingComplaintCodeType\TimingComplaintCode;
use InvoiceNinja\EInvoice\Models\Peppol\UUIDType\UUID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class ReceivedHandlingUnitReceiptLine
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var UUID */
	#[SerializedName('cbc:UUID')]
	public $UUID;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var ReceivedQuantity */
	#[SerializedName('cbc:ReceivedQuantity')]
	public $ReceivedQuantity;

	/** @var ShortQuantity */
	#[SerializedName('cbc:ShortQuantity')]
	public $ShortQuantity;

	/** @var ShortageActionCode */
	#[SerializedName('cbc:ShortageActionCode')]
	public $ShortageActionCode;

	/** @var RejectedQuantity */
	#[SerializedName('cbc:RejectedQuantity')]
	public $RejectedQuantity;

	/** @var RejectReasonCode */
	#[SerializedName('cbc:RejectReasonCode')]
	public $RejectReasonCode;

	/** @var string */
	#[SerializedName('cbc:RejectReason')]
	public string $RejectReason;

	/** @var RejectActionCode */
	#[SerializedName('cbc:RejectActionCode')]
	public $RejectActionCode;

	/** @var QuantityDiscrepancyCode */
	#[SerializedName('cbc:QuantityDiscrepancyCode')]
	public $QuantityDiscrepancyCode;

	/** @var OversupplyQuantity */
	#[SerializedName('cbc:OversupplyQuantity')]
	public $OversupplyQuantity;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ReceivedDate')]
	public DateTime $ReceivedDate;

	/** @var TimingComplaintCode */
	#[SerializedName('cbc:TimingComplaintCode')]
	public $TimingComplaintCode;

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
