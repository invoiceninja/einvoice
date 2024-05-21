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
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class ActualPackage extends Data
{
	public string|Optional $ID;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Quantity;
	public bool|Optional $ReturnableMaterialIndicator;
	public string|Optional $PackageLevelCode;
	public string|Optional $PackagingTypeCode;

	#[DataCollectionOf('PackingMaterial')]
	public string|Optional $PackingMaterial;
	public string|Optional $TraceID;

	#[DataCollectionOf('ContainedPackage')]
	public ContainedPackage|Optional $ContainedPackage;
	public ContainingTransportEquipment|Optional $ContainingTransportEquipment;

	#[DataCollectionOf('GoodsItem')]
	public GoodsItem|Optional $GoodsItem;

	#[DataCollectionOf('MeasurementDimension')]
	public MeasurementDimension|Optional $MeasurementDimension;

	#[DataCollectionOf('DeliveryUnit')]
	public DeliveryUnit|Optional $DeliveryUnit;
	public Delivery|Optional $Delivery;
	public Pickup|Optional $Pickup;
	public Despatch|Optional $Despatch;
}
