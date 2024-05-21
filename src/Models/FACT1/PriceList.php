<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PriceListType\PreviousPriceList;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PriceList extends Data
{
	public string|Optional $ID;
	public string|Optional $StatusCode;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod')]
	public ValidityPeriod|Optional $ValidityPeriod;
	public PreviousPriceList|Optional $PreviousPriceList;
}
