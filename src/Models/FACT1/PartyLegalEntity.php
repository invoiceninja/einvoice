<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\RegistrationAddress;
use Invoiceninja\Einvoice\Models\FACT1\CorporateRegistrationSchemeType\CorporateRegistrationScheme;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\HeadOfficeParty;
use Invoiceninja\Einvoice\Models\FACT1\ShareholderPartyType\ShareholderParty;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PartyLegalEntity extends Data
{
	public string|Optional $RegistrationName;
	public string|Optional $CompanyID;
	public Carbon|Optional $RegistrationDate;
	public Carbon|Optional $RegistrationExpirationDate;
	public string|Optional $CompanyLegalFormCode;
	public string|Optional $CompanyLegalForm;
	public \boolean|Optional $SoleProprietorshipIndicator;
	public string|Optional $CompanyLiquidationStatusCode;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $CorporateStockAmount;
	public \boolean|Optional $FullyPaidSharesIndicator;
	public RegistrationAddress|Optional $RegistrationAddress;
	public CorporateRegistrationScheme|Optional $CorporateRegistrationScheme;
	public HeadOfficeParty|Optional $HeadOfficeParty;
	public ShareholderParty|Optional $ShareholderParty;
}
