<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\Quantity;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\TransportEquipment;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class GoodsItemContainer
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var Quantity */
	#[SerializedName('cbc:Quantity')]
	public $Quantity;

	/** @var TransportEquipment[] */
	#[SerializedName('cac:TransportEquipment')]
	public array $TransportEquipment;
}
