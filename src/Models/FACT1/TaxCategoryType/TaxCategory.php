<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\TaxSchemeType\TaxScheme;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TaxCategory extends Data
{
	public string|Optional $ID;
	public string|Optional $Name;
	public string|Optional $Percent;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $BaseUnitMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PerUnitAmount;
	public string|Optional $TaxExemptionReasonCode;

	#[Max(100)]
	public string|Optional $TaxExemptionReason;
	public string|Optional $TierRange;
	public string|Optional $TierRatePercent;
	public ?TaxScheme $TaxScheme;
}
