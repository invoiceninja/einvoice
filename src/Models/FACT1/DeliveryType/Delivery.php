<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\DeliveryType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\DeliveryAddress;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryTermsType\DeliveryTerms;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\MaximumDeliveryUnit;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\MinimumDeliveryUnit;
use Invoiceninja\Einvoice\Models\FACT1\DespatchType\Despatch;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\AlternativeDeliveryLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\DeliveryLocation;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\CarrierParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\DeliveryParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\NotifyParty;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\EstimatedDeliveryPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\PromisedDeliveryPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\RequestedDeliveryPeriod;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\MaximumQuantity;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\MinimumQuantity;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\Quantity;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\Shipment;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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

class Delivery
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var Quantity */
	#[SerializedName('cbc:Quantity')]
	public $Quantity;

	/** @var MinimumQuantity */
	#[SerializedName('cbc:MinimumQuantity')]
	public $MinimumQuantity;

	/** @var MaximumQuantity */
	#[SerializedName('cbc:MaximumQuantity')]
	public $MaximumQuantity;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ActualDeliveryDate')]
	public DateTime $ActualDeliveryDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ActualDeliveryTime')]
	public DateTime $ActualDeliveryTime;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:LatestDeliveryDate')]
	public DateTime $LatestDeliveryDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:LatestDeliveryTime')]
	public DateTime $LatestDeliveryTime;

	/** @var string */
	#[SerializedName('cbc:ReleaseID')]
	public string $ReleaseID;

	/** @var string */
	#[SerializedName('cbc:TrackingID')]
	public string $TrackingID;

	/** @var DeliveryAddress */
	#[SerializedName('cac:DeliveryAddress')]
	public $DeliveryAddress;

	/** @var DeliveryLocation */
	#[SerializedName('cac:DeliveryLocation')]
	public $DeliveryLocation;

	/** @var AlternativeDeliveryLocation */
	#[SerializedName('cac:AlternativeDeliveryLocation')]
	public $AlternativeDeliveryLocation;

	/** @var RequestedDeliveryPeriod */
	#[SerializedName('cac:RequestedDeliveryPeriod')]
	public $RequestedDeliveryPeriod;

	/** @var PromisedDeliveryPeriod */
	#[SerializedName('cac:PromisedDeliveryPeriod')]
	public $PromisedDeliveryPeriod;

	/** @var EstimatedDeliveryPeriod */
	#[SerializedName('cac:EstimatedDeliveryPeriod')]
	public $EstimatedDeliveryPeriod;

	/** @var CarrierParty */
	#[SerializedName('cac:CarrierParty')]
	public $CarrierParty;

	/** @var DeliveryParty */
	#[SerializedName('cac:DeliveryParty')]
	public $DeliveryParty;

	/** @var NotifyParty[] */
	#[SerializedName('cac:NotifyParty')]
	public array $NotifyParty = [];

	/** @var Despatch */
	#[SerializedName('cac:Despatch')]
	public $Despatch;

	/** @var DeliveryTerms[] */
	#[SerializedName('cac:DeliveryTerms')]
	public array $DeliveryTerms = [];

	/** @var MinimumDeliveryUnit */
	#[SerializedName('cac:MinimumDeliveryUnit')]
	public $MinimumDeliveryUnit;

	/** @var MaximumDeliveryUnit */
	#[SerializedName('cac:MaximumDeliveryUnit')]
	public $MaximumDeliveryUnit;

	/** @var Shipment */
	#[SerializedName('cac:Shipment')]
	public $Shipment;
}
