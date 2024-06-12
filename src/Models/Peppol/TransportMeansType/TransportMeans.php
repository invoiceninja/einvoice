<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\TransportMeansType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AirTransportType\AirTransport;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\DirectionCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TradeServiceCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TransportMeansTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\MeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\JourneyID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\RegistrationNationalityID;
use InvoiceNinja\EInvoice\Models\Peppol\MaritimeTransportType\MaritimeTransport;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\OwnerParty;
use InvoiceNinja\EInvoice\Models\Peppol\RailTransportType\RailTransport;
use InvoiceNinja\EInvoice\Models\Peppol\RoadTransportType\RoadTransport;
use InvoiceNinja\EInvoice\Models\Peppol\StowageType\Stowage;
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

class TransportMeans
{
	/** @var JourneyID */
	#[SerializedName('cbc:JourneyID')]
	public $JourneyID;

	/** @var RegistrationNationalityID */
	#[SerializedName('cbc:RegistrationNationalityID')]
	public $RegistrationNationalityID;

	/** @var string */
	#[SerializedName('cbc:RegistrationNationality')]
	public string $RegistrationNationality;

	/** @var DirectionCode */
	#[SerializedName('cbc:DirectionCode')]
	public $DirectionCode;

	/** @var TransportMeansTypeCode */
	#[SerializedName('cbc:TransportMeansTypeCode')]
	public $TransportMeansTypeCode;

	/** @var TradeServiceCode */
	#[SerializedName('cbc:TradeServiceCode')]
	public $TradeServiceCode;

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
