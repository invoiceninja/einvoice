<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\RangeDimension;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyGroupType\ItemPropertyGroup;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyRangeType\ItemPropertyRange;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\UsabilityPeriod;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ItemProperty extends Data
{
	public string|Optional $ID;

	#[Required]
	public string $Name;
	public string|Optional $NameCode;
	public string|Optional $TestMethod;
	public string|Optional $Value;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ValueQuantity;

	#[DataCollectionOf('ValueQualifier')]
	public string|Optional $ValueQualifier;
	public string|Optional $ImportanceCode;

	#[DataCollectionOf('ListValue')]
	public string|Optional $ListValue;
	public UsabilityPeriod|Optional $UsabilityPeriod;

	#[DataCollectionOf('ItemPropertyGroup')]
	public ItemPropertyGroup|Optional $ItemPropertyGroup;
	public RangeDimension|Optional $RangeDimension;
	public ItemPropertyRange|Optional $ItemPropertyRange;
}
