<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\LocationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\Address;
use Invoiceninja\Einvoice\Models\FACT1\LocationCoordinateType\LocationCoordinate;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FreightChargeLocation extends Data
{
	public string|Optional $ID;
	public string|Optional $Description;
	public string|Optional $Conditions;
	public string|Optional $CountrySubentity;
	public string|Optional $CountrySubentityCode;
	public string|Optional $LocationTypeCode;
	public string|Optional $InformationURI;
	public string|Optional $Name;
	public ValidityPeriod|Optional $ValidityPeriod;
	public Address|Optional $Address;
	public SubsidiaryLocation|Optional $SubsidiaryLocation;
	public LocationCoordinate|Optional $LocationCoordinate;
}
