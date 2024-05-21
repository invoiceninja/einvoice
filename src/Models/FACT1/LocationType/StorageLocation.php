<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\LocationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\Address;
use Invoiceninja\Einvoice\Models\FACT1\LocationCoordinateType\LocationCoordinate;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class StorageLocation extends Data
{
	public string|Optional $ID;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Description;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Conditions;
	public string|Optional $CountrySubentity;
	public string|Optional $CountrySubentityCode;
	public string|Optional $LocationTypeCode;
	public string|Optional $InformationURI;
	public string|Optional $Name;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ValidityPeriod;
	public Address|Optional $Address;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\LocationType\SubsidiaryLocation')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $SubsidiaryLocation;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\LocationCoordinateType\LocationCoordinate')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $LocationCoordinate;
}
