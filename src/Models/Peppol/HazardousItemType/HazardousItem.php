<?php

namespace Invoiceninja\Einvoice\Models\Peppol\HazardousItemType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\HazardousGoodsTransitType\HazardousGoodsTransit;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\ContactParty;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\Quantity;
use Invoiceninja\Einvoice\Models\Peppol\SecondaryHazardType\SecondaryHazard;
use Invoiceninja\Einvoice\Models\Peppol\TemperatureType\AdditionalTemperature;
use Invoiceninja\Einvoice\Models\Peppol\TemperatureType\EmergencyTemperature;
use Invoiceninja\Einvoice\Models\Peppol\TemperatureType\FlashpointTemperature;
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
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

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

    /** @var string */
    #[SerializedName('cbc:UpperOrangeHazardPlacardID')]
    public string $UpperOrangeHazardPlacardID;

    /** @var string */
    #[SerializedName('cbc:LowerOrangeHazardPlacardID')]
    public string $LowerOrangeHazardPlacardID;

    /** @var string */
    #[SerializedName('cbc:MarkingID')]
    public string $MarkingID;

    /** @var string */
    #[SerializedName('cbc:HazardClassID')]
    public string $HazardClassID;

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
