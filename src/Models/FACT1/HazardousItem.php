<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\ContactParty;
use Invoiceninja\Einvoice\Models\FACT1\SecondaryHazardType\SecondaryHazard;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\AdditionalTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\EmergencyTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\FlashpointTemperature;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class HazardousItem extends Data
{
	public string|Optional $ID;
	public string|Optional $PlacardNotation;
	public string|Optional $PlacardEndorsement;

	#[DataCollectionOf('string')]
	public string|Optional $AdditionalInformation;
	public string|Optional $UNDGCode;
	public string|Optional $EmergencyProceduresCode;
	public string|Optional $MedicalFirstAidGuideCode;
	public string|Optional $TechnicalName;
	public string|Optional $CategoryName;
	public string|Optional $HazardousCategoryCode;
	public string|Optional $UpperOrangeHazardPlacardID;
	public string|Optional $LowerOrangeHazardPlacardID;
	public string|Optional $MarkingID;
	public string|Optional $HazardClassID;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetWeightMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetVolumeMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Quantity;
	public ContactParty|Optional $ContactParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\SecondaryHazardType\SecondaryHazard')]
	public SecondaryHazard|Optional $SecondaryHazard;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit')]
	public HazardousGoodsTransit|Optional $HazardousGoodsTransit;
	public EmergencyTemperature|Optional $EmergencyTemperature;
	public FlashpointTemperature|Optional $FlashpointTemperature;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TemperatureType\AdditionalTemperature')]
	public AdditionalTemperature|Optional $AdditionalTemperature;
}
