<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\AirTransportType\AirTransport;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\MaritimeTransportType\MaritimeTransport;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\OwnerParty;
use Invoiceninja\Einvoice\Models\FACT1\RailTransportType\RailTransport;
use Invoiceninja\Einvoice\Models\FACT1\RoadTransportType\RoadTransport;
use Invoiceninja\Einvoice\Models\FACT1\StowageType\Stowage;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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
