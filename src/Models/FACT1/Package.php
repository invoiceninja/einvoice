<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\Delivery;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\DeliveryUnit;
use Invoiceninja\Einvoice\Models\FACT1\DespatchType\Despatch;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem;
use Invoiceninja\Einvoice\Models\FACT1\PackageType\ContainedPackage;
use Invoiceninja\Einvoice\Models\FACT1\PickupType\Pickup;
use Invoiceninja\Einvoice\Models\FACT1\TransportEquipmentType\ContainingTransportEquipment;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Package extends Data
{
	public string|Optional $ID;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Quantity;
	public bool|Optional $ReturnableMaterialIndicator;
	public string|Optional $PackageLevelCode;
	public string|Optional $PackagingTypeCode;

	#[DataCollectionOf('string')]
	public string|Optional $PackingMaterial;
	public string|Optional $TraceID;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PackageType\ContainedPackage')]
	public ContainedPackage|Optional $ContainedPackage;
	public ContainingTransportEquipment|Optional $ContainingTransportEquipment;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\GoodsItemType\GoodsItem')]
	public GoodsItem|Optional $GoodsItem;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension')]
	public MeasurementDimension|Optional $MeasurementDimension;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DeliveryUnitType\DeliveryUnit')]
	public DeliveryUnit|Optional $DeliveryUnit;
	public Delivery|Optional $Delivery;
	public Pickup|Optional $Pickup;
	public Despatch|Optional $Despatch;
}
