<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ExchangeRateType\ExchangeRate;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\PenaltyPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\SettlementPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PaymentTerms extends Data
{
	public string|Optional $ID;
	public string|Optional $PaymentMeansID;
	public string|Optional $PrepaidPaymentReferenceID;
	public string|Optional $Note;
	public string|Optional $ReferenceEventCode;
	public string|Optional $SettlementDiscountPercent;
	public string|Optional $PenaltySurchargePercent;
	public string|Optional $PaymentPercent;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Amount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $SettlementDiscountAmount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PenaltyAmount;
	public string|Optional $PaymentTermsDetailsURI;
	public Carbon|Optional $PaymentDueDate;
	public Carbon|Optional $InstallmentDueDate;
	public string|Optional $InvoicingPartyReference;
	public SettlementPeriod|Optional $SettlementPeriod;
	public PenaltyPeriod|Optional $PenaltyPeriod;
	public ExchangeRate|Optional $ExchangeRate;
	public ValidityPeriod|Optional $ValidityPeriod;
}
