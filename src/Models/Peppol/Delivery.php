<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\DeliveryAddress;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryTermsType\DeliveryTerms;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryUnitType\MaximumDeliveryUnit;
use InvoiceNinja\EInvoice\Models\Peppol\DeliveryUnitType\MinimumDeliveryUnit;
use InvoiceNinja\EInvoice\Models\Peppol\DespatchType\Despatch;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ReleaseID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\TrackingID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\AlternativeDeliveryLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\DeliveryLocation;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\CarrierParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\DeliveryParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\NotifyParty;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\EstimatedDeliveryPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\PromisedDeliveryPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\RequestedDeliveryPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\MaximumQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\MinimumQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\Quantity;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentType\Shipment;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Delivery
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var Quantity */
	#[SerializedName('cbc:Quantity')]
	public $Quantity;

	/** @var MinimumQuantity */
	#[SerializedName('cbc:MinimumQuantity')]
	public $MinimumQuantity;

	/** @var MaximumQuantity */
	#[SerializedName('cbc:MaximumQuantity')]
	public $MaximumQuantity;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ActualDeliveryDate')]
	public ?DateTime $ActualDeliveryDate;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ActualDeliveryTime')]
	public ?DateTime $ActualDeliveryTime;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:LatestDeliveryDate')]
	public ?DateTime $LatestDeliveryDate;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:LatestDeliveryTime')]
	public ?DateTime $LatestDeliveryTime;

	/** @var ReleaseID */
	#[SerializedName('cbc:ReleaseID')]
	public $ReleaseID;

	/** @var TrackingID */
	#[SerializedName('cbc:TrackingID')]
	public $TrackingID;

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
	public array $NotifyParty;

	/** @var Despatch */
	#[SerializedName('cac:Despatch')]
	public $Despatch;

	/** @var DeliveryTerms[] */
	#[SerializedName('cac:DeliveryTerms')]
	public array $DeliveryTerms;

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
