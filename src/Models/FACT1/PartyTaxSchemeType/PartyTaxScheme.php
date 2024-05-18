<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PartyTaxSchemeType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\RegistrationAddress;
use Invoiceninja\Einvoice\Models\FACT1\TaxSchemeType\TaxScheme;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PartyTaxScheme extends Data
{
	public string|Optional $RegistrationName;
	public string|Optional $CompanyID;
	public string|Optional $TaxLevelCode;
	public string|Optional $ExemptionReasonCode;
	public string|Optional $ExemptionReason;
	public RegistrationAddress|Optional $RegistrationAddress;
	public ?TaxScheme $TaxScheme;
}
