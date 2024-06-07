<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AirTransportType\AirTransport;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\MeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\MaritimeTransportType\MaritimeTransport;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\OwnerParty;
use InvoiceNinja\EInvoice\Models\Peppol\RailTransportType\RailTransport;
use InvoiceNinja\EInvoice\Models\Peppol\RoadTransportType\RoadTransport;
use InvoiceNinja\EInvoice\Models\Peppol\StowageType\Stowage;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class TransportMeans
{
	/** @var string */
	#[SerializedName('cbc:JourneyID')]
	public string $JourneyID;

	/** @var string */
	#[SerializedName('cbc:RegistrationNationalityID')]
	public string $RegistrationNationalityID;

	/** @var string */
	#[SerializedName('cbc:RegistrationNationality')]
	public string $RegistrationNationality;

	/** @var string */
	#[SerializedName('cbc:DirectionCode')]
	public string $DirectionCode;

	/** @var string */
	#[SerializedName('cbc:TransportMeansTypeCode')]
	public string $TransportMeansTypeCode;

	/** @var string */
	#[SerializedName('cbc:TradeServiceCode')]
	public string $TradeServiceCode;

	/** @var Stowage */
	#[SerializedName('cac:Stowage')]
	public $Stowage;

	/** @var AirTransport */
	#[SerializedName('cac:AirTransport')]
	public $AirTransport;

	/** @var RoadTransport */
	#[SerializedName('cac:RoadTransport')]
	public $RoadTransport;

	/** @var RailTransport */
	#[SerializedName('cac:RailTransport')]
	public $RailTransport;

	/** @var MaritimeTransport */
	#[SerializedName('cac:MaritimeTransport')]
	public $MaritimeTransport;

	/** @var OwnerParty */
	#[SerializedName('cac:OwnerParty')]
	public $OwnerParty;

	/** @var MeasurementDimension[] */
	#[SerializedName('cac:MeasurementDimension')]
	public array $MeasurementDimension;
}
