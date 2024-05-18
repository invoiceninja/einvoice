<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\TaxSchemeType\TaxScheme;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TaxCategory extends Data
{
	public string|Optional $ID;
	public string|Optional $Name;
	public string|Optional $Percent;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $BaseUnitMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PerUnitAmount;
	public string|Optional $TaxExemptionReasonCode;
	public string|Optional $TaxExemptionReason;
	public string|Optional $TierRange;
	public string|Optional $TierRatePercent;
	public ?TaxScheme $TaxScheme;
}
