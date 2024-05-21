<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ShipmentType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\OriginAddress;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\ReturnAddress;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\FreightAllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\ConsignmentType\Consignment;
use Invoiceninja\Einvoice\Models\FACT1\CountryType\ExportCountry;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\FirstArrivalPortLocation;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\LastExitPortLocation;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentStageType\ShipmentStage;
use Invoiceninja\Einvoice\Models\FACT1\TransportHandlingUnitType\TransportHandlingUnit;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class ReportedShipment extends Data
{
	#[Required]
	public string $ID;
	public string|Optional $ShippingPriorityLevelCode;
	public string|Optional $HandlingCode;

	#[DataCollectionOf('string')]
	public string|Optional $HandlingInstructions;

	#[DataCollectionOf('string')]
	public string|Optional $Information;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossWeightMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetWeightMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetNetWeightMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossVolumeMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetVolumeMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalGoodsItemQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalTransportHandlingUnitQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $InsuranceValueAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeclaredCustomsValueAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeclaredForCarriageValueAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DeclaredStatisticsValueAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $FreeOnBoardValueAmount;

	#[DataCollectionOf('string')]
	public string|Optional $SpecialInstructions;

	#[DataCollectionOf('string')]
	public string|Optional $DeliveryInstructions;
	public bool|Optional $SplitConsignmentIndicator;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ConsignmentQuantity;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ConsignmentType\Consignment')]
	public Consignment|Optional $Consignment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem')]
	public GoodsItem|Optional $GoodsItem;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ShipmentStageType\ShipmentStage')]
	public ShipmentStage|Optional $ShipmentStage;
	public Delivery|Optional $Delivery;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportHandlingUnitType\TransportHandlingUnit')]
	public TransportHandlingUnit|Optional $TransportHandlingUnit;
	public ReturnAddress|Optional $ReturnAddress;
	public OriginAddress|Optional $OriginAddress;
	public FirstArrivalPortLocation|Optional $FirstArrivalPortLocation;
	public LastExitPortLocation|Optional $LastExitPortLocation;
	public ExportCountry|Optional $ExportCountry;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\FreightAllowanceCharge')]
	public FreightAllowanceCharge|Optional $FreightAllowanceCharge;
}
