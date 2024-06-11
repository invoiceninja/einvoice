<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\HazardClassIDType\HazardClassID;
use InvoiceNinja\EInvoice\Models\Peppol\HazardousGoodsTransitType\HazardousGoodsTransit;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\LowerOrangeHazardPlacardIDType\LowerOrangeHazardPlacardID;
use InvoiceNinja\EInvoice\Models\Peppol\MarkingIDType\MarkingID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\ContactParty;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\Quantity;
use InvoiceNinja\EInvoice\Models\Peppol\SecondaryHazardType\SecondaryHazard;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\AdditionalTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\EmergencyTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\FlashpointTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\UpperOrangeHazardPlacardIDType\UpperOrangeHazardPlacardID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
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

	/** @var string */
	#[SerializedName('cbc:UNDGCode')]
	public string $UNDGCode;

	/** @var string */
	#[SerializedName('cbc:EmergencyProceduresCode')]
	public string $EmergencyProceduresCode;

	/** @var string */
	#[SerializedName('cbc:MedicalFirstAidGuideCode')]
	public string $MedicalFirstAidGuideCode;

	/** @var string */
	#[SerializedName('cbc:TechnicalName')]
	public string $TechnicalName;

	/** @var string */
	#[SerializedName('cbc:CategoryName')]
	public string $CategoryName;

	/** @var string */
	#[SerializedName('cbc:HazardousCategoryCode')]
	public string $HazardousCategoryCode;

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

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:NetWeightMeasure')]
	public string $NetWeightMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:NetVolumeMeasure')]
	public string $NetVolumeMeasure;

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
