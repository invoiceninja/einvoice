<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ExchangeRateType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContractType\ForeignExchangeContract;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ExchangeRate extends Data
{
	#[Required]
	public string $SourceCurrencyCode;
	public string|Optional $SourceCurrencyBaseRate;

	#[Required]
	public string $TargetCurrencyCode;
	public string|Optional $TargetCurrencyBaseRate;
	public string|Optional $ExchangeMarketID;
	public string|Optional $CalculationRate;
	public string|Optional $MathematicOperatorCode;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $Date;
	public ForeignExchangeContract|Optional $ForeignExchangeContract;
}
