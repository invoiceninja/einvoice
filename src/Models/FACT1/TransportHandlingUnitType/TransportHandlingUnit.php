<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransportHandlingUnitType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\CustomsDeclarationType\CustomsDeclaration;
use Invoiceninja\Einvoice\Models\FACT1\DespatchLineType\HandlingUnitDespatchLine;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\FloorSpaceMeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\PalletSpaceMeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ShipmentDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem;
use Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit;
use Invoiceninja\Einvoice\Models\FACT1\PackageType\ActualPackage;
use Invoiceninja\Einvoice\Models\FACT1\PackageType\Package;
use Invoiceninja\Einvoice\Models\FACT1\ReceiptLineType\ReceivedHandlingUnitReceiptLine;
use Invoiceninja\Einvoice\Models\FACT1\ShipmentType\ReferencedShipment;
use Invoiceninja\Einvoice\Models\FACT1\StatusType\Status;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\MaximumTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\MinimumTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\TransportEquipment;
use Invoiceninja\Einvoice\Models\FACT1\TransportMeansType\TransportMeans;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TransportHandlingUnit extends Data
{
	public string|Optional $ID;
	public string|Optional $TransportHandlingUnitTypeCode;
	public string|Optional $HandlingCode;

	#[DataCollectionOf('HandlingInstructions')]
	public string|Optional $HandlingInstructions;
	public bool|Optional $HazardousRiskIndicator;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalGoodsItemQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalPackageQuantity;

	#[DataCollectionOf('DamageRemarks')]
	public string|Optional $DamageRemarks;

	#[DataCollectionOf('ShippingMarks')]
	public string|Optional $ShippingMarks;
	public string|Optional $TraceID;

	#[DataCollectionOf('HandlingUnitDespatchLine')]
	public HandlingUnitDespatchLine|Optional $HandlingUnitDespatchLine;

	#[DataCollectionOf('ActualPackage')]
	public ActualPackage|Optional $ActualPackage;

	#[DataCollectionOf('ReceivedHandlingUnitReceiptLine')]
	public ReceivedHandlingUnitReceiptLine|Optional $ReceivedHandlingUnitReceiptLine;

	#[DataCollectionOf('TransportEquipment')]
	public TransportEquipment|Optional $TransportEquipment;

	#[DataCollectionOf('TransportMeans')]
	public TransportMeans|Optional $TransportMeans;

	#[DataCollectionOf('HazardousGoodsTransit')]
	public HazardousGoodsTransit|Optional $HazardousGoodsTransit;

	#[DataCollectionOf('MeasurementDimension')]
	public MeasurementDimension|Optional $MeasurementDimension;
	public MinimumTemperature|Optional $MinimumTemperature;
	public MaximumTemperature|Optional $MaximumTemperature;

	#[DataCollectionOf('GoodsItem')]
	public GoodsItem|Optional $GoodsItem;
	public FloorSpaceMeasurementDimension|Optional $FloorSpaceMeasurementDimension;
	public PalletSpaceMeasurementDimension|Optional $PalletSpaceMeasurementDimension;

	#[DataCollectionOf('ShipmentDocumentReference')]
	public ShipmentDocumentReference|Optional $ShipmentDocumentReference;

	#[DataCollectionOf('Status')]
	public Status|Optional $Status;

	#[DataCollectionOf('CustomsDeclaration')]
	public CustomsDeclaration|Optional $CustomsDeclaration;

	#[DataCollectionOf('ReferencedShipment')]
	public ReferencedShipment|Optional $ReferencedShipment;

	#[DataCollectionOf('Package')]
	public Package|Optional $Package;
}
