<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\HazardousItemType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\EmergencyProceduresCodeType\EmergencyProceduresCode;
use InvoiceNinja\EInvoice\Models\Peppol\HazardClassIDType\HazardClassID;
use InvoiceNinja\EInvoice\Models\Peppol\HazardousCategoryCodeType\HazardousCategoryCode;
use InvoiceNinja\EInvoice\Models\Peppol\HazardousGoodsTransitType\HazardousGoodsTransit;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\LowerOrangeHazardPlacardIDType\LowerOrangeHazardPlacardID;
use InvoiceNinja\EInvoice\Models\Peppol\MarkingIDType\MarkingID;
use InvoiceNinja\EInvoice\Models\Peppol\MedicalFirstAidGuideCodeType\MedicalFirstAidGuideCode;
use InvoiceNinja\EInvoice\Models\Peppol\NetVolumeMeasureType\NetVolumeMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\NetWeightMeasureType\NetWeightMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\ContactParty;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\Quantity;
use InvoiceNinja\EInvoice\Models\Peppol\SecondaryHazardType\SecondaryHazard;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\AdditionalTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\EmergencyTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\FlashpointTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\UNDGCodeType\UNDGCode;
use InvoiceNinja\EInvoice\Models\Peppol\UpperOrangeHazardPlacardIDType\UpperOrangeHazardPlacardID;
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

class HazardousItem
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:PlacardNotation')]
	public string $PlacardNotation;

	/** @var string */
	#[SerializedName('cbc:PlacardEndorsement')]
	public string $PlacardEndorsement;

	/** @var string */
	#[SerializedName('cbc:AdditionalInformation')]
	public string $AdditionalInformation;

	/** @var UNDGCode */
	#[SerializedName('cbc:UNDGCode')]
	public $UNDGCode;

	/** @var EmergencyProceduresCode */
	#[SerializedName('cbc:EmergencyProceduresCode')]
	public $EmergencyProceduresCode;

	/** @var MedicalFirstAidGuideCode */
	#[SerializedName('cbc:MedicalFirstAidGuideCode')]
	public $MedicalFirstAidGuideCode;

	/** @var string */
	#[SerializedName('cbc:TechnicalName')]
	public string $TechnicalName;

	/** @var string */
	#[SerializedName('cbc:CategoryName')]
	public string $CategoryName;

	/** @var HazardousCategoryCode */
	#[SerializedName('cbc:HazardousCategoryCode')]
	public $HazardousCategoryCode;

	/** @var UpperOrangeHazardPlacardID */
	#[SerializedName('cbc:UpperOrangeHazardPlacardID')]
	public $UpperOrangeHazardPlacardID;

	/** @var LowerOrangeHazardPlacardID */
	#[SerializedName('cbc:LowerOrangeHazardPlacardID')]
	public $LowerOrangeHazardPlacardID;

	/** @var MarkingID */
	#[SerializedName('cbc:MarkingID')]
	public $MarkingID;

	/** @var HazardClassID */
	#[SerializedName('cbc:HazardClassID')]
	public $HazardClassID;

	/** @var NetWeightMeasure */
	#[SerializedName('cbc:NetWeightMeasure')]
	public $NetWeightMeasure;

	/** @var NetVolumeMeasure */
	#[SerializedName('cbc:NetVolumeMeasure')]
	public $NetVolumeMeasure;

	/** @var Quantity */
	#[SerializedName('cbc:Quantity')]
	public $Quantity;

	/** @var ContactParty */
	#[SerializedName('cac:ContactParty')]
	public $ContactParty;

	/** @var SecondaryHazard[] */
	#[SerializedName('cac:SecondaryHazard')]
	public array $SecondaryHazard;

	/** @var HazardousGoodsTransit[] */
	#[SerializedName('cac:HazardousGoodsTransit')]
	public array $HazardousGoodsTransit;

	/** @var EmergencyTemperature */
	#[SerializedName('cac:EmergencyTemperature')]
	public $EmergencyTemperature;

	/** @var FlashpointTemperature */
	#[SerializedName('cac:FlashpointTemperature')]
	public $FlashpointTemperature;

	/** @var AdditionalTemperature[] */
	#[SerializedName('cac:AdditionalTemperature')]
	public array $AdditionalTemperature;
}
