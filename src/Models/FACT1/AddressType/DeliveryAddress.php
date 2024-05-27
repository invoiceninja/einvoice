<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\AddressType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\AddressLineType\AddressLine;
use Invoiceninja\Einvoice\Models\FACT1\CountryType\Country;
use Invoiceninja\Einvoice\Models\FACT1\LocationCoordinateType\LocationCoordinate;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DeliveryAddress
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:AddressTypeCode')]
	public string $AddressTypeCode;

	/** @var string */
	#[SerializedName('cbc:AddressFormatCode')]
	public string $AddressFormatCode;

	/** @var string */
	#[SerializedName('cbc:Postbox')]
	public string $Postbox;

	/** @var string */
	#[SerializedName('cbc:Floor')]
	public string $Floor;

	/** @var string */
	#[SerializedName('cbc:Room')]
	public string $Room;

	/** @var string */
	#[Length(min: 1, max: 150)]
	#[SerializedName('cbc:StreetName')]
	public string $StreetName;

	/** @var string */
	#[Length(min: null, max: 100)]
	#[SerializedName('cbc:AdditionalStreetName')]
	public string $AdditionalStreetName;

	/** @var string */
	#[SerializedName('cbc:BlockName')]
	public string $BlockName;

	/** @var string */
	#[SerializedName('cbc:BuildingName')]
	public string $BuildingName;

	/** @var string */
	#[SerializedName('cbc:BuildingNumber')]
	public string $BuildingNumber;

	/** @var string */
	#[SerializedName('cbc:InhouseMail')]
	public string $InhouseMail;

	/** @var string */
	#[SerializedName('cbc:Department')]
	public string $Department;

	/** @var string */
	#[SerializedName('cbc:MarkAttention')]
	public string $MarkAttention;

	/** @var string */
	#[SerializedName('cbc:MarkCare')]
	public string $MarkCare;

	/** @var string */
	#[SerializedName('cbc:PlotIdentification')]
	public string $PlotIdentification;

	/** @var string */
	#[SerializedName('cbc:CitySubdivisionName')]
	public string $CitySubdivisionName;

	/** @var string */
	#[Length(min: 1, max: 50)]
	#[SerializedName('cbc:CityName')]
	public string $CityName;

	/** @var string */
	#[Length(min: null, max: 20)]
	#[SerializedName('cbc:PostalZone')]
	public string $PostalZone;

	/** @var string */
	#[Choice([
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
	])]
	#[SerializedName('cbc:CountrySubentity')]
	public string $CountrySubentity;

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

	/** @var string */
	#[SerializedName('cbc:CountrySubentityCode')]
	public string $CountrySubentityCode;

	/** @var string */
	#[SerializedName('cbc:Region')]
	public string $Region;

	/** @var string */
	#[SerializedName('cbc:District')]
	public string $District;

	/** @var string */
	#[SerializedName('cbc:TimezoneOffset')]
	public string $TimezoneOffset;

	/** @var AddressLine[] */
	#[SerializedName('cac:AddressLine')]
	public array $AddressLine;

	/** @var Country */
	#[SerializedName('cac:Country')]
	public $Country;

	/** @var LocationCoordinate[] */
	#[SerializedName('cac:LocationCoordinate')]
	public array $LocationCoordinate;
}
