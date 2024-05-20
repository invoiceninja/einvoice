<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PaymentMeansType\PaymentMeans;
use Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\TaxCategory;
use Invoiceninja\Einvoice\Models\FACT1\TaxTotalType\TaxTotal;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AllowanceCharge extends Data
{
	public string|Optional $ID;
	public ?bool $ChargeIndicator;
	public string|Optional $AllowanceChargeReasonCode;
	public string|Optional $AllowanceChargeReason;
	public string|Optional $MultiplierFactorNumeric;
	public bool|Optional $PrepaidIndicator;
	public string|Optional $SequenceNumeric;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public ?float $Amount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $BaseAmount;
	public string|Optional $AccountingCostCode;
	public string|Optional $AccountingCost;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PerUnitAmount;
	public TaxCategory|Optional $TaxCategory;
	public TaxTotal|Optional $TaxTotal;
	public PaymentMeans|Optional $PaymentMeans;
}
