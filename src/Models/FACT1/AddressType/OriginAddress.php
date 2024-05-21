<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\AddressType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressLineType\AddressLine;
use Invoiceninja\Einvoice\Models\FACT1\CountryType\Country;
use Invoiceninja\Einvoice\Models\FACT1\LocationCoordinateType\LocationCoordinate;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OriginAddress extends Data
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
	public ?string $StreetName;

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
	public ?string $CityName;

	#[Max(20)]
	public string|Optional $PostalZone;

	#[Required]
	#[Min(1)]
	public ?string $CountrySubentity;

	private array $CountrySubentity_array = [
		'RO-AB',
		'RO-AG',
		'RO-AR',
		'RO-B',
		'RO-BC',
		'RO-BH',
		'RO-BN',
		'RO-BR',
		'RO-BT',
		'RO-BV',
		'RO-BZ',
		'RO-CJ',
		'RO-CL',
		'RO-CS',
		'RO-CT',
		'RO-CV',
		'RO-DB',
		'RO-DJ',
		'RO-GJ',
		'RO-GL',
		'RO-GR',
		'RO-HD',
		'RO-HR',
		'RO-IF',
		'RO-IL',
		'RO-IS',
		'RO-MH',
		'RO-MM',
		'RO-MS',
		'RO-NT',
		'RO-OT',
		'RO-PH',
		'RO-SB',
		'RO-SJ',
		'RO-SM',
		'RO-SV',
		'RO-TL',
		'RO-TM',
		'RO-TR',
		'RO-VL',
		'RO-VN',
		'RO-VS',
	];

	public string|Optional $CountrySubentityCode;
	public string|Optional $Region;
	public string|Optional $District;
	public string|Optional $TimezoneOffset;

	/** @param array<AddressLine> $AddressLine */
	public array|Optional $AddressLine;
	public Country|Optional $Country;

	/** @param array<LocationCoordinate> $LocationCoordinate */
	public array|Optional $LocationCoordinate;
}
