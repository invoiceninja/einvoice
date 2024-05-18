<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Period extends Data
{
	public Carbon|Optional $StartDate;
	public \time|Optional $StartTime;
	public Carbon|Optional $EndDate;
	public \time|Optional $EndTime;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $DurationMeasure;
	public string|Optional $DescriptionCode;
	private array $DescriptionCode_array = [3 => 'Invoice Date', 35 => 'Delivery Date', 432 => 'Payment Date'];
	public string|Optional $Description;
}
