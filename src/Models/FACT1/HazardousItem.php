<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\ContactParty;
use Invoiceninja\Einvoice\Models\FACT1\SecondaryHazardType\SecondaryHazard;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\AdditionalTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\EmergencyTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\FlashpointTemperature;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class HazardousItem extends Data
{
	public string|Optional $ID;
	public string|Optional $PlacardNotation;
	public string|Optional $PlacardEndorsement;

	/** @param array<AdditionalInformation> $AdditionalInformation */
	public array|Optional $AdditionalInformation;
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

	/** @param array<SecondaryHazard> $SecondaryHazard */
	public array|Optional $SecondaryHazard;

	/** @param array<HazardousGoodsTransit> $HazardousGoodsTransit */
	public array|Optional $HazardousGoodsTransit;
	public EmergencyTemperature|Optional $EmergencyTemperature;
	public FlashpointTemperature|Optional $FlashpointTemperature;

	/** @param array<AdditionalTemperature> $AdditionalTemperature */
	public array|Optional $AdditionalTemperature;
}
