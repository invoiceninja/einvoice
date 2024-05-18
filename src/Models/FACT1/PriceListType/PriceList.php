<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PriceListType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PriceList extends Data
{
	public string|Optional $ID;
	public string|Optional $StatusCode;
	public ValidityPeriod|Optional $ValidityPeriod;
	public PreviousPriceList|Optional $PreviousPriceList;
}
