<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\BackorderQuantityType\BackorderQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveredQuantityType\DeliveredQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\ItemType\Item;
use InvoiceNinja\EInvoice\Models\Peppol\LineStatusCodeType\LineStatusCode;
use InvoiceNinja\EInvoice\Models\Peppol\OrderLineReferenceType\OrderLineReference;
use InvoiceNinja\EInvoice\Models\Peppol\OutstandingQuantityType\OutstandingQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\OversupplyQuantityType\OversupplyQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\Shipment;
use InvoiceNinja\EInvoice\Models\Peppol\UUIDType\UUID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class DespatchLine
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

	/** @var LineStatusCode */
	#[SerializedName('cbc:LineStatusCode')]
	public $LineStatusCode;

	/** @var DeliveredQuantity */
	#[SerializedName('cbc:DeliveredQuantity')]
	public $DeliveredQuantity;

	/** @var BackorderQuantity */
	#[SerializedName('cbc:BackorderQuantity')]
	public $BackorderQuantity;

	/** @var string */
	#[SerializedName('cbc:BackorderReason')]
	public string $BackorderReason;

	/** @var OutstandingQuantity */
	#[SerializedName('cbc:OutstandingQuantity')]
	public $OutstandingQuantity;

	/** @var string */
	#[SerializedName('cbc:OutstandingReason')]
	public string $OutstandingReason;

	/** @var OversupplyQuantity */
	#[SerializedName('cbc:OversupplyQuantity')]
	public $OversupplyQuantity;

	/** @var OrderLineReference[] */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cac:OrderLineReference')]
	public array $OrderLineReference;

	/** @var DocumentReference[] */
	#[SerializedName('cac:DocumentReference')]
	public array $DocumentReference;

	/** @var Item */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cac:Item')]
	public $Item;

	/** @var Shipment[] */
	#[SerializedName('cac:Shipment')]
	public array $Shipment;
}
