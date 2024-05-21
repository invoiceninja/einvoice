<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PackageType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\DeliveryUnit;
use Invoiceninja\Einvoice\Models\FACT1\DespatchType\Despatch;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem;
use Invoiceninja\Einvoice\Models\FACT1\PickupType\Pickup;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\ContainingTransportEquipment;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Package extends Data
{
	public string|Optional $ID;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Quantity;
	public bool|Optional $ReturnableMaterialIndicator;
	public string|Optional $PackageLevelCode;
	public string|Optional $PackagingTypeCode;

	/** @param array<PackingMaterial> $PackingMaterial */
	public array|Optional $PackingMaterial;
	public string|Optional $TraceID;

	/** @param array<ContainedPackage> $ContainedPackage */
	public array|Optional $ContainedPackage;
	public ContainingTransportEquipment|Optional $ContainingTransportEquipment;

	/** @param array<GoodsItem> $GoodsItem */
	public array|Optional $GoodsItem;

	/** @param array<MeasurementDimension> $MeasurementDimension */
	public array|Optional $MeasurementDimension;

	/** @param array<DeliveryUnit> $DeliveryUnit */
	public array|Optional $DeliveryUnit;
	public Delivery|Optional $Delivery;
	public Pickup|Optional $Pickup;
	public Despatch|Optional $Despatch;
}
