<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\ContactParty;
use Invoiceninja\Einvoice\Models\FACT1\SecondaryHazardType\SecondaryHazard;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\AdditionalTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\EmergencyTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\FlashpointTemperature;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class HazardousItem extends Data
{
	public string|Optional $ID;
	public string|Optional $PlacardNotation;
	public string|Optional $PlacardEndorsement;

	#[DataCollectionOf('string')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
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
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public SecondaryHazard|Optional $SecondaryHazard;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public HazardousGoodsTransit|Optional $HazardousGoodsTransit;
	public EmergencyTemperature|Optional $EmergencyTemperature;
	public FlashpointTemperature|Optional $FlashpointTemperature;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TemperatureType\AdditionalTemperature')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public AdditionalTemperature|Optional $AdditionalTemperature;
}
