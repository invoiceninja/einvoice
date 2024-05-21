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
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TransportHandlingUnit extends Data
{
	public string|Optional $ID;
	public string|Optional $TransportHandlingUnitTypeCode;
	public string|Optional $HandlingCode;

	/** @param array<HandlingInstructions> $HandlingInstructions */
	public array|Optional $HandlingInstructions;
	public bool|Optional $HazardousRiskIndicator;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalGoodsItemQuantity;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TotalPackageQuantity;

	/** @param array<DamageRemarks> $DamageRemarks */
	public array|Optional $DamageRemarks;

	/** @param array<ShippingMarks> $ShippingMarks */
	public array|Optional $ShippingMarks;
	public string|Optional $TraceID;

	/** @param array<HandlingUnitDespatchLine> $HandlingUnitDespatchLine */
	public array|Optional $HandlingUnitDespatchLine;

	/** @param array<ActualPackage> $ActualPackage */
	public array|Optional $ActualPackage;

	/** @param array<ReceivedHandlingUnitReceiptLine> $ReceivedHandlingUnitReceiptLine */
	public array|Optional $ReceivedHandlingUnitReceiptLine;

	/** @param array<TransportEquipment> $TransportEquipment */
	public array|Optional $TransportEquipment;

	/** @param array<TransportMeans> $TransportMeans */
	public array|Optional $TransportMeans;

	/** @param array<HazardousGoodsTransit> $HazardousGoodsTransit */
	public array|Optional $HazardousGoodsTransit;

	/** @param array<MeasurementDimension> $MeasurementDimension */
	public array|Optional $MeasurementDimension;
	public MinimumTemperature|Optional $MinimumTemperature;
	public MaximumTemperature|Optional $MaximumTemperature;

	/** @param array<GoodsItem> $GoodsItem */
	public array|Optional $GoodsItem;
	public FloorSpaceMeasurementDimension|Optional $FloorSpaceMeasurementDimension;
	public PalletSpaceMeasurementDimension|Optional $PalletSpaceMeasurementDimension;

	/** @param array<ShipmentDocumentReference> $ShipmentDocumentReference */
	public array|Optional $ShipmentDocumentReference;

	/** @param array<Status> $Status */
	public array|Optional $Status;

	/** @param array<CustomsDeclaration> $CustomsDeclaration */
	public array|Optional $CustomsDeclaration;

	/** @param array<ReferencedShipment> $ReferencedShipment */
	public array|Optional $ReferencedShipment;

	/** @param array<Package> $Package */
	public array|Optional $Package;
}
