<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PriceListType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class PreviousPriceList extends Data
{
	public string|Optional $ID;
	public string|Optional $StatusCode;

	#[DataCollectionOf('ValidityPeriod')]
	public ValidityPeriod|Optional $ValidityPeriod;
}
