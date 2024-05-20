<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PaymentMeansType\PaymentMeans;
use Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\TaxCategory;
use Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\TaxTotal;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FreightAllowanceCharge extends Data
{
	public string|Optional $ID;
	public ?bool $ChargeIndicator;

	#[Max(100)]
	public string|Optional $AllowanceChargeReasonCode;

	#[Max(100)]
	public string|Optional $AllowanceChargeReason;
	public string|Optional $MultiplierFactorNumeric;
	public bool|Optional $PrepaidIndicator;
	public string|Optional $SequenceNumeric;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $Amount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $BaseAmount;
	public string|Optional $AccountingCostCode;
	public string|Optional $AccountingCost;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PerUnitAmount;
	public TaxCategory|Optional $TaxCategory;
	public TaxTotal|Optional $TaxTotal;
	public PaymentMeans|Optional $PaymentMeans;
}
