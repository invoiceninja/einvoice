<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\LocationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\Address;
use Invoiceninja\Einvoice\Models\FACT1\LocationCoordinateType\LocationCoordinate;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FirstArrivalPortLocation extends Data
{
	public string|Optional $ID;

	/** @param array<Description> $Description */
	public array|Optional $Description;

	/** @param array<Conditions> $Conditions */
	public array|Optional $Conditions;
	public string|Optional $CountrySubentity;
	public string|Optional $CountrySubentityCode;
	public string|Optional $LocationTypeCode;
	public string|Optional $InformationURI;
	public string|Optional $Name;

	/** @param array<ValidityPeriod> $ValidityPeriod */
	public array|Optional $ValidityPeriod;
	public Address|Optional $Address;

	/** @param array<SubsidiaryLocation> $SubsidiaryLocation */
	public array|Optional $SubsidiaryLocation;

	/** @param array<LocationCoordinate> $LocationCoordinate */
	public array|Optional $LocationCoordinate;
}
