<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\PickupLocation;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\PickupParty;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class Pickup
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ActualPickupDate')]
	public DateTime $ActualPickupDate;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ActualPickupTime')]
	public DateTime $ActualPickupTime;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:EarliestPickupDate')]
	public DateTime $EarliestPickupDate;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:EarliestPickupTime')]
	public DateTime $EarliestPickupTime;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:LatestPickupDate')]
	public DateTime $LatestPickupDate;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:LatestPickupTime')]
	public DateTime $LatestPickupTime;

	/** @var PickupLocation */
	#[SerializedName('cac:PickupLocation')]
	public $PickupLocation;

	/** @var PickupParty */
	#[SerializedName('cac:PickupParty')]
	public $PickupParty;
}
