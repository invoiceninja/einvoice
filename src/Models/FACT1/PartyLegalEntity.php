<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\RegistrationAddress;
use Invoiceninja\Einvoice\Models\FACT1\CorporateRegistrationSchemeType\CorporateRegistrationScheme;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\HeadOfficeParty;
use Invoiceninja\Einvoice\Models\FACT1\ShareholderPartyType\ShareholderParty;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class PartyLegalEntity extends Data
{
	public string|Optional $RegistrationName;
	public string|Optional $CompanyID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $RegistrationDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $RegistrationExpirationDate;
	public string|Optional $CompanyLegalFormCode;
	public string|Optional $CompanyLegalForm;
	public bool|Optional $SoleProprietorshipIndicator;
	public string|Optional $CompanyLiquidationStatusCode;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $CorporateStockAmount;
	public bool|Optional $FullyPaidSharesIndicator;
	public RegistrationAddress|Optional $RegistrationAddress;
	public CorporateRegistrationScheme|Optional $CorporateRegistrationScheme;
	public HeadOfficeParty|Optional $HeadOfficeParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ShareholderPartyType\ShareholderParty')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ShareholderParty;
}
