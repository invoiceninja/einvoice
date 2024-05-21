<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\LocationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\Address;
use Invoiceninja\Einvoice\Models\FACT1\LocationCoordinateType\LocationCoordinate;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class UnloadingPortLocation extends Data
{
	public string|Optional $ID;

	#[DataCollectionOf('Description')]
	public string|Optional $Description;

	#[DataCollectionOf('Conditions')]
	public string|Optional $Conditions;
	public string|Optional $CountrySubentity;
	public string|Optional $CountrySubentityCode;
	public string|Optional $LocationTypeCode;
	public string|Optional $InformationURI;
	public string|Optional $Name;

	#[DataCollectionOf('ValidityPeriod')]
	public ValidityPeriod|Optional $ValidityPeriod;
	public Address|Optional $Address;

	#[DataCollectionOf('SubsidiaryLocation')]
	public SubsidiaryLocation|Optional $SubsidiaryLocation;

	#[DataCollectionOf('LocationCoordinate')]
	public LocationCoordinate|Optional $LocationCoordinate;
}
