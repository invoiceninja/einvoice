<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\RegistrationAddress;
use Invoiceninja\Einvoice\Models\FACT1\TaxSchemeType\TaxScheme;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PartyTaxScheme extends Data
{
	public string|Optional $RegistrationName;
	public string|Optional $CompanyID;
	public string|Optional $TaxLevelCode;
	public string|Optional $ExemptionReasonCode;

	#[DataCollectionOf('string')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $ExemptionReason;
	public RegistrationAddress|Optional $RegistrationAddress;

	#[Required]
	public TaxScheme $TaxScheme;
}
