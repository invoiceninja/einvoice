<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\TransportationServiceType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CommodityClassificationType\CommodityClassification;
use InvoiceNinja\EInvoice\Models\Peppol\CommodityClassificationType\SupportedCommodityClassification;
use InvoiceNinja\EInvoice\Models\Peppol\CommodityClassificationType\UnsupportedCommodityClassification;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\TotalCapacityDimension;
use InvoiceNinja\EInvoice\Models\Peppol\EnvironmentalEmissionType\EnvironmentalEmission;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\ResponsibleTransportServiceProviderParty;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\EstimatedDurationPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\ServiceFrequencyType\ScheduledServiceFrequency;
use InvoiceNinja\EInvoice\Models\Peppol\ShipmentStageType\ShipmentStage;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\SupportedTransportEquipment;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\TransportEquipment;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentType\UnsupportedTransportEquipment;
use InvoiceNinja\EInvoice\Models\Peppol\TransportEventType\TransportEvent;
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

class OriginalDespatchTransportationService
{
	/** @var string */
	#[SerializedName('cbc:TransportServiceCode')]
	public string $TransportServiceCode;

	/** @var string */
	#[SerializedName('cbc:TariffClassCode')]
	public string $TariffClassCode;

	/** @var string */
	#[SerializedName('cbc:Priority')]
	public string $Priority;

	/** @var string */
	#[SerializedName('cbc:FreightRateClassCode')]
	public string $FreightRateClassCode;

	/** @var string */
	#[SerializedName('cbc:TransportationServiceDescription')]
	public string $TransportationServiceDescription;

	/** @var string */
	#[SerializedName('cbc:TransportationServiceDetailsURI')]
	public string $TransportationServiceDetailsURI;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:NominationDate')]
	public DateTime $NominationDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:NominationTime')]
	public DateTime $NominationTime;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var string */
	#[SerializedName('cbc:SequenceNumeric')]
	public string $SequenceNumeric;

	/** @var TransportEquipment[] */
	#[SerializedName('cac:TransportEquipment')]
	public array $TransportEquipment;

	/** @var SupportedTransportEquipment[] */
	#[SerializedName('cac:SupportedTransportEquipment')]
	public array $SupportedTransportEquipment;

	/** @var UnsupportedTransportEquipment[] */
	#[SerializedName('cac:UnsupportedTransportEquipment')]
	public array $UnsupportedTransportEquipment;

	/** @var CommodityClassification[] */
	#[SerializedName('cac:CommodityClassification')]
	public array $CommodityClassification;

	/** @var SupportedCommodityClassification[] */
	#[SerializedName('cac:SupportedCommodityClassification')]
	public array $SupportedCommodityClassification;

	/** @var UnsupportedCommodityClassification[] */
	#[SerializedName('cac:UnsupportedCommodityClassification')]
	public array $UnsupportedCommodityClassification;

	/** @var TotalCapacityDimension */
	#[SerializedName('cac:TotalCapacityDimension')]
	public $TotalCapacityDimension;

	/** @var ShipmentStage[] */
	#[SerializedName('cac:ShipmentStage')]
	public array $ShipmentStage;

	/** @var TransportEvent[] */
	#[SerializedName('cac:TransportEvent')]
	public array $TransportEvent;

	/** @var ResponsibleTransportServiceProviderParty */
	#[SerializedName('cac:ResponsibleTransportServiceProviderParty')]
	public $ResponsibleTransportServiceProviderParty;

	/** @var EnvironmentalEmission[] */
	#[SerializedName('cac:EnvironmentalEmission')]
	public array $EnvironmentalEmission;

	/** @var EstimatedDurationPeriod */
	#[SerializedName('cac:EstimatedDurationPeriod')]
	public $EstimatedDurationPeriod;

	/** @var ScheduledServiceFrequency[] */
	#[SerializedName('cac:ScheduledServiceFrequency')]
	public array $ScheduledServiceFrequency;
}
