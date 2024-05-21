<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ItemPropertyType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\RangeDimension;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyGroupType\ItemPropertyGroup;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyRangeType\ItemPropertyRange;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\UsabilityPeriod;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AdditionalItemProperty extends Data
{
	public string|Optional $ID;

	#[Required]
	#[Max(50)]
	public string $Name;
	public string|Optional $NameCode;
	public string|Optional $TestMethod;

	#[Max(100)]
	public string|Optional $Value;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ValueQuantity;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ValueQualifier;
	public string|Optional $ImportanceCode;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ListValue;
	public UsabilityPeriod|Optional $UsabilityPeriod;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemPropertyGroupType\ItemPropertyGroup')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ItemPropertyGroup;
	public RangeDimension|Optional $RangeDimension;
	public ItemPropertyRange|Optional $ItemPropertyRange;
}
