<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PartyLegalEntityType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\RegistrationAddress;
use Invoiceninja\Einvoice\Models\FACT1\CorporateRegistrationSchemeType\CorporateRegistrationScheme;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\HeadOfficeParty;
use Invoiceninja\Einvoice\Models\FACT1\ShareholderPartyType\ShareholderParty;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class PartyLegalEntity extends Data
{
	#[Max(200)]
	public string|Optional $RegistrationName;
	public string|Optional $CompanyID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $RegistrationDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $RegistrationExpirationDate;
	public string|Optional $CompanyLegalFormCode;

	#[Max(1000)]
	public string|Optional $CompanyLegalForm;
	public \boolean|Optional $SoleProprietorshipIndicator;
	public string|Optional $CompanyLiquidationStatusCode;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $CorporateStockAmount;
	public \boolean|Optional $FullyPaidSharesIndicator;
	public RegistrationAddress|Optional $RegistrationAddress;
	public CorporateRegistrationScheme|Optional $CorporateRegistrationScheme;
	public HeadOfficeParty|Optional $HeadOfficeParty;
	public ShareholderParty|Optional $ShareholderParty;
}
