<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\OriginAddress;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\FreightAllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\FACT1\DespatchType\Despatch;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ShipmentDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\GoodsItemContainerType\GoodsItemContainer;
use Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\ContainedGoodsItem;
use Invoiceninja\Einvoice\Models\FACT1\InvoiceLineType\InvoiceLine;
use Invoiceninja\Einvoice\Models\FACT1\ItemType\Item;
use Invoiceninja\Einvoice\Models\FACT1\PackageType\ContainingPackage;
use Invoiceninja\Einvoice\Models\FACT1\PickupType\Pickup;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\MaximumTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\MinimumTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\Temperature;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GoodsItem extends Data
{
	public string|Optional $ID;
	public string|Optional $SequenceNumberID;

	#[DataCollectionOf('string')]
	public string|Optional $Description;
	public bool|Optional $HazardousRiskIndicator;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeclaredCustomsValueAmount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeclaredForCarriageValueAmount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeclaredStatisticsValueAmount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $FreeOnBoardValueAmount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $InsuranceValueAmount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ValueAmount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossWeightMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetWeightMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetNetWeightMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ChargeableWeightMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossVolumeMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetVolumeMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Quantity;
	public string|Optional $PreferenceCriterionCode;
	public string|Optional $RequiredCustomsID;
	public string|Optional $CustomsStatusCode;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $CustomsTariffQuantity;
	public bool|Optional $CustomsImportClassifiedIndicator;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ChargeableQuantity;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ReturnableQuantity;
	public string|Optional $TraceID;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemType\Item')]
	public Item|Optional $Item;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\GoodsItemContainerType\GoodsItemContainer')]
	public GoodsItemContainer|Optional $GoodsItemContainer;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\FreightAllowanceCharge')]
	public FreightAllowanceCharge|Optional $FreightAllowanceCharge;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\InvoiceLineType\InvoiceLine')]
	public InvoiceLine|Optional $InvoiceLine;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TemperatureType\Temperature')]
	public Temperature|Optional $Temperature;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\ContainedGoodsItem')]
	public ContainedGoodsItem|Optional $ContainedGoodsItem;
	public OriginAddress|Optional $OriginAddress;
	public Delivery|Optional $Delivery;
	public Pickup|Optional $Pickup;
	public Despatch|Optional $Despatch;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension')]
	public MeasurementDimension|Optional $MeasurementDimension;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PackageType\ContainingPackage')]
	public ContainingPackage|Optional $ContainingPackage;
	public ShipmentDocumentReference|Optional $ShipmentDocumentReference;
	public MinimumTemperature|Optional $MinimumTemperature;
	public MaximumTemperature|Optional $MaximumTemperature;
}
