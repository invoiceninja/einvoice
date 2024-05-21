<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

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
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TransportHandlingUnit extends Data
{
	public string|Optional $ID;
	public string|Optional $TransportHandlingUnitTypeCode;
	public string|Optional $HandlingCode;

	#[DataCollectionOf('string')]
	public string|Optional $HandlingInstructions;
	public bool|Optional $HazardousRiskIndicator;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalGoodsItemQuantity;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalPackageQuantity;

	#[DataCollectionOf('string')]
	public string|Optional $DamageRemarks;

	#[DataCollectionOf('string')]
	public string|Optional $ShippingMarks;
	public string|Optional $TraceID;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DespatchLineType\HandlingUnitDespatchLine')]
	public HandlingUnitDespatchLine|Optional $HandlingUnitDespatchLine;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PackageType\ActualPackage')]
	public ActualPackage|Optional $ActualPackage;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ReceiptLineType\ReceivedHandlingUnitReceiptLine')]
	public ReceivedHandlingUnitReceiptLine|Optional $ReceivedHandlingUnitReceiptLine;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\TransportEquipment')]
	public TransportEquipment|Optional $TransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportMeansType\TransportMeans')]
	public TransportMeans|Optional $TransportMeans;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit')]
	public HazardousGoodsTransit|Optional $HazardousGoodsTransit;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension')]
	public MeasurementDimension|Optional $MeasurementDimension;
	public MinimumTemperature|Optional $MinimumTemperature;
	public MaximumTemperature|Optional $MaximumTemperature;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem')]
	public GoodsItem|Optional $GoodsItem;
	public FloorSpaceMeasurementDimension|Optional $FloorSpaceMeasurementDimension;
	public PalletSpaceMeasurementDimension|Optional $PalletSpaceMeasurementDimension;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ShipmentDocumentReference')]
	public ShipmentDocumentReference|Optional $ShipmentDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\StatusType\Status')]
	public Status|Optional $Status;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CustomsDeclarationType\CustomsDeclaration')]
	public CustomsDeclaration|Optional $CustomsDeclaration;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ShipmentType\ReferencedShipment')]
	public ReferencedShipment|Optional $ReferencedShipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PackageType\Package')]
	public Package|Optional $Package;
}
