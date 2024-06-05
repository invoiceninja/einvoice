<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\Quantity;
use Invoiceninja\Einvoice\Models\Peppol\TransportEquipmentType\TransportEquipment;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class GoodsItemContainer
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var Quantity */
	#[SerializedName('cbc:Quantity')]
	public $Quantity;

	/** @var TransportEquipment[] */
	#[SerializedName('cac:TransportEquipment')]
	public array $TransportEquipment;
}
