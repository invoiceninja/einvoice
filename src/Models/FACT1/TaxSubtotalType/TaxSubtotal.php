<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TaxSubtotalType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\TaxCategory;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TaxSubtotal extends Data
{
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TaxableAmount;

	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $TaxAmount;
	public string|Optional $CalculationSequenceNumeric;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $TransactionCurrencyTaxAmount;
	public string|Optional $Percent;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $BaseUnitMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PerUnitAmount;
	public string|Optional $TierRange;
	public string|Optional $TierRatePercent;

	#[Required]
	public TaxCategory $TaxCategory;
}
