<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ClauseType\Clause;
use Invoiceninja\Einvoice\Models\FACT1\FinancialAccountType\PayerFinancialAccount;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\PayerParty;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\PaymentReversalPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PaymentMandate extends Data
{
	public string|Optional $ID;
	public string|Optional $MandateTypeCode;
	public string|Optional $MaximumPaymentInstructionsNumeric;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $MaximumPaidAmount;
	public string|Optional $SignatureID;
	public PayerParty|Optional $PayerParty;
	public PayerFinancialAccount|Optional $PayerFinancialAccount;
	public ValidityPeriod|Optional $ValidityPeriod;
	public PaymentReversalPeriod|Optional $PaymentReversalPeriod;

	#[DataCollectionOf('Clause')]
	public Clause|Optional $Clause;
}
