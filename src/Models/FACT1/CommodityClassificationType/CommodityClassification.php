<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CommodityClassification extends Data
{
	public string|Optional $NatureCode;
	public string|Optional $CargoTypeCode;
	public string|Optional $CommodityCode;
	public string|Optional $ItemClassificationCode;
}
