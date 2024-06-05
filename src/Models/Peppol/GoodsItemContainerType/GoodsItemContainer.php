<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\GoodsItemContainerType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\Quantity;
use Invoiceninja\Einvoice\Models\Peppol\TransportEquipmentType\TransportEquipment;
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
