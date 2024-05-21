<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\RegistrationAddress;
use Invoiceninja\Einvoice\Models\FACT1\TaxSchemeType\TaxScheme;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PartyTaxScheme extends Data
{
	public string|Optional $RegistrationName;
	public string|Optional $CompanyID;
	public string|Optional $TaxLevelCode;
	public string|Optional $ExemptionReasonCode;

	/** @param array<ExemptionReason> $ExemptionReason */
	public array|Optional $ExemptionReason;
	public RegistrationAddress|Optional $RegistrationAddress;

	#[Required]
	public TaxScheme $TaxScheme;
}
