<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\AddressType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressLineType\AddressLine;
use Invoiceninja\Einvoice\Models\FACT1\CountryType\Country;
use Invoiceninja\Einvoice\Models\FACT1\LocationCoordinateType\LocationCoordinate;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class JurisdictionRegionAddress extends Data
{
	public string|Optional $ID;
	public string|Optional $AddressTypeCode;
	public string|Optional $AddressFormatCode;
	public string|Optional $Postbox;
	public string|Optional $Floor;
	public string|Optional $Room;

	#[Required]
	#[Max(150)]
	#[Min(1)]
	public string $StreetName;

	#[Max(100)]
	public string|Optional $AdditionalStreetName;
	public string|Optional $BlockName;
	public string|Optional $BuildingName;
	public string|Optional $BuildingNumber;
	public string|Optional $InhouseMail;
	public string|Optional $Department;
	public string|Optional $MarkAttention;
	public string|Optional $MarkCare;
	public string|Optional $PlotIdentification;
	public string|Optional $CitySubdivisionName;

	#[Required]
	#[Max(50)]
	#[Min(1)]
	public string $CityName;

	#[Max(20)]
	public string|Optional $PostalZone;

	#[Required]
	#[Min(1)]
	public string $CountrySubentity;

	private array $CountrySubentity_array = [
		0,
		1,
		2,
		3,
		4,
		5,
		6,
		7,
		8,
		9,
		10,
		11,
		12,
		13,
		14,
		15,
		16,
		17,
		18,
		19,
		20,
		21,
		22,
		23,
		24,
		25,
		26,
		27,
		28,
		29,
		30,
		31,
		32,
		33,
		34,
		35,
		36,
		37,
		38,
		39,
		40,
		41,
	];

	public string|Optional $CountrySubentityCode;
	public string|Optional $Region;
	public string|Optional $District;
	public string|Optional $TimezoneOffset;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AddressLineType\AddressLine')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $AddressLine;
	public Country|Optional $Country;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\LocationCoordinateType\LocationCoordinate')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $LocationCoordinate;
}
