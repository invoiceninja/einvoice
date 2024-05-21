<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PriceListType\PreviousPriceList;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PriceList extends Data
{
	public string|Optional $ID;
	public string|Optional $StatusCode;

	/** @param array<ValidityPeriod> $ValidityPeriod */
	public array|Optional $ValidityPeriod;
	public PreviousPriceList|Optional $PreviousPriceList;
}
