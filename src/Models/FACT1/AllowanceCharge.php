<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PaymentMeansType\PaymentMeans;
use Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\TaxCategory;
use Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\TaxTotal;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AllowanceCharge extends Data
{
	public string|Optional $ID;

	#[Required]
	public bool $ChargeIndicator;
	public string|Optional $AllowanceChargeReasonCode;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $AllowanceChargeReason;
	public string|Optional $MultiplierFactorNumeric;
	public bool|Optional $PrepaidIndicator;
	public string|Optional $SequenceNumeric;

	#[Required]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $Amount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $BaseAmount;
	public string|Optional $AccountingCostCode;
	public string|Optional $AccountingCost;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PerUnitAmount;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\TaxCategory')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TaxCategory;
	public TaxTotal|Optional $TaxTotal;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PaymentMeansType\PaymentMeans')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PaymentMeans;
}
