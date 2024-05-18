<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UnsupportedCommodityClassification extends Data
{
	public string|Optional $NatureCode;
	public string|Optional $CargoTypeCode;
	public string|Optional $CommodityCode;
	public string|Optional $ItemClassificationCode;
}
