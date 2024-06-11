<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\DespatchLineType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\ItemType\Item;
use InvoiceNinja\EInvoice\Models\Peppol\OrderLineReferenceType\OrderLineReference;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\BackorderQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\DeliveredQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\OutstandingQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\OversupplyQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\Shipment;
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

class HandlingUnitDespatchLine
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

	/** @var string */
	#[SerializedName('cbc:LineStatusCode')]
	public string $LineStatusCode;

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
