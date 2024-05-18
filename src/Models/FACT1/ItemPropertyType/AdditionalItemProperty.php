<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ItemPropertyType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\RangeDimension;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyGroupType\ItemPropertyGroup;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyRangeType\ItemPropertyRange;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\UsabilityPeriod;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AdditionalItemProperty extends Data
{
	public string|Optional $ID;

	#[Max(50)]
	public ?string $Name;
	public string|Optional $NameCode;
	public string|Optional $TestMethod;

	#[Max(100)]
	public string|Optional $Value;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $ValueQuantity;
	public string|Optional $ValueQualifier;
	public string|Optional $ImportanceCode;
	public string|Optional $ListValue;
	public UsabilityPeriod|Optional $UsabilityPeriod;
	public ItemPropertyGroup|Optional $ItemPropertyGroup;
	public RangeDimension|Optional $RangeDimension;
	public ItemPropertyRange|Optional $ItemPropertyRange;
}