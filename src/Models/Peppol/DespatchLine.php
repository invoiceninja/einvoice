<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\ItemType\Item;
use Invoiceninja\Einvoice\Models\Peppol\OrderLineReferenceType\OrderLineReference;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\BackorderQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\DeliveredQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\OutstandingQuantity;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\OversupplyQuantity;
use Invoiceninja\Einvoice\Models\Peppol\ShipmentType\Shipment;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class DespatchLine
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
