<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class BillingReferenceLine extends Data
{
	public ?string $ID;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Amount;
	public AllowanceCharge|Optional $AllowanceCharge;
}
