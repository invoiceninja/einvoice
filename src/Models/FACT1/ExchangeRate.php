<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContractType\ForeignExchangeContract;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ExchangeRate extends Data
{
	public ?string $SourceCurrencyCode;
	public string|Optional $SourceCurrencyBaseRate;
	public ?string $TargetCurrencyCode;
	public string|Optional $TargetCurrencyBaseRate;
	public string|Optional $ExchangeMarketID;
	public string|Optional $CalculationRate;
	public string|Optional $MathematicOperatorCode;
	public Carbon|Optional $Date;
	public ForeignExchangeContract|Optional $ForeignExchangeContract;
}
