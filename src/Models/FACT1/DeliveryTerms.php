<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\DeliveryLocation;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DeliveryTerms extends Data
{
	public string|Optional $ID;
	public string|Optional $SpecialTerms;
	public string|Optional $LossRiskResponsibilityCode;
	public string|Optional $LossRisk;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Amount;
	public DeliveryLocation|Optional $DeliveryLocation;
	public AllowanceCharge|Optional $AllowanceCharge;
}