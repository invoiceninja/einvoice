<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ExchangeRateType\ExchangeRate;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\PenaltyPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\SettlementPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class PaymentTerms extends Data
{
	public string|Optional $ID;

	/** @param array<PaymentMeansID> $PaymentMeansID */
	public array|Optional $PaymentMeansID;
	public string|Optional $PrepaidPaymentReferenceID;

	/** @param array<Note> $Note */
	#[Max(300)]
	public array|Optional $Note;
	public string|Optional $ReferenceEventCode;
	public string|Optional $SettlementDiscountPercent;
	public string|Optional $PenaltySurchargePercent;
	public string|Optional $PaymentPercent;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Amount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $SettlementDiscountAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PenaltyAmount;
	public string|Optional $PaymentTermsDetailsURI;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $PaymentDueDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $InstallmentDueDate;
	public string|Optional $InvoicingPartyReference;
	public SettlementPeriod|Optional $SettlementPeriod;
	public PenaltyPeriod|Optional $PenaltyPeriod;
	public ExchangeRate|Optional $ExchangeRate;
	public ValidityPeriod|Optional $ValidityPeriod;
}
