<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\DeliveryTermsType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\DeliveryLocation;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DeliveryTerms extends Data
{
	public string|Optional $ID;

	/** @param array<SpecialTerms> $SpecialTerms */
	public array|Optional $SpecialTerms;
	public string|Optional $LossRiskResponsibilityCode;

	/** @param array<LossRisk> $LossRisk */
	public array|Optional $LossRisk;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $Amount;
	public DeliveryLocation|Optional $DeliveryLocation;
	public AllowanceCharge|Optional $AllowanceCharge;
}
