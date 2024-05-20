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
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PackagedTransportHandlingUnit extends Data
{
	public string|Optional $ID;
	public string|Optional $TransportHandlingUnitTypeCode;
	public string|Optional $HandlingCode;
	public string|Optional $HandlingInstructions;
	public bool|Optional $HazardousRiskIndicator;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalGoodsItemQuantity;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalPackageQuantity;
	public string|Optional $DamageRemarks;
	public string|Optional $ShippingMarks;
	public string|Optional $TraceID;
	public HandlingUnitDespatchLine|Optional $HandlingUnitDespatchLine;
	public ActualPackage|Optional $ActualPackage;
	public ReceivedHandlingUnitReceiptLine|Optional $ReceivedHandlingUnitReceiptLine;
	public TransportEquipment|Optional $TransportEquipment;
	public TransportMeans|Optional $TransportMeans;
	public HazardousGoodsTransit|Optional $HazardousGoodsTransit;
	public MeasurementDimension|Optional $MeasurementDimension;
	public MinimumTemperature|Optional $MinimumTemperature;
	public MaximumTemperature|Optional $MaximumTemperature;
	public GoodsItem|Optional $GoodsItem;
	public FloorSpaceMeasurementDimension|Optional $FloorSpaceMeasurementDimension;
	public PalletSpaceMeasurementDimension|Optional $PalletSpaceMeasurementDimension;
	public ShipmentDocumentReference|Optional $ShipmentDocumentReference;
	public Status|Optional $Status;
	public CustomsDeclaration|Optional $CustomsDeclaration;
	public ReferencedShipment|Optional $ReferencedShipment;
	public Package|Optional $Package;
}
