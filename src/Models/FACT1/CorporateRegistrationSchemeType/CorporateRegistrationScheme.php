<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\CorporateRegistrationSchemeType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\JurisdictionRegionAddress;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class CorporateRegistrationScheme extends Data
{
	public string|Optional $ID;
	public string|Optional $Name;
	public string|Optional $CorporateRegistrationTypeCode;

	#[DataCollectionOf('JurisdictionRegionAddress')]
	public JurisdictionRegionAddress|Optional $JurisdictionRegionAddress;
}
