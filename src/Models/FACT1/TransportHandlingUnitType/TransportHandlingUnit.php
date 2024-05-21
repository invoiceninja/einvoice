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
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class TransportHandlingUnit extends Data
{
	public string|Optional $ID;
	public string|Optional $TransportHandlingUnitTypeCode;
	public string|Optional $HandlingCode;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $HandlingInstructions;
	public bool|Optional $HazardousRiskIndicator;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalGoodsItemQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalPackageQuantity;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DamageRemarks;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ShippingMarks;
	public string|Optional $TraceID;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DespatchLineType\HandlingUnitDespatchLine')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $HandlingUnitDespatchLine;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PackageType\ActualPackage')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ActualPackage;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ReceiptLineType\ReceivedHandlingUnitReceiptLine')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ReceivedHandlingUnitReceiptLine;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\TransportEquipment')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransportMeansType\TransportMeans')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TransportMeans;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\HazardousGoodsTransitType\HazardousGoodsTransit')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $HazardousGoodsTransit;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $MeasurementDimension;
	public MinimumTemperature|Optional $MinimumTemperature;
	public MaximumTemperature|Optional $MaximumTemperature;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $GoodsItem;
	public FloorSpaceMeasurementDimension|Optional $FloorSpaceMeasurementDimension;
	public PalletSpaceMeasurementDimension|Optional $PalletSpaceMeasurementDimension;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ShipmentDocumentReference')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ShipmentDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\StatusType\Status')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Status;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CustomsDeclarationType\CustomsDeclaration')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $CustomsDeclaration;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ShipmentType\ReferencedShipment')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ReferencedShipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PackageType\Package')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Package;
}
